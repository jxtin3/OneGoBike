<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class ChatbotService
{
    private string $apiKey;

    private string $model;

    private string $systemPrompt;

    private string $baseUrl = 'https://api.openai.com/v1';

    public function __construct()
    {
        $this->apiKey = (string) config('chatbot.api_key');
        $this->model = (string) config('chatbot.model');
        $this->systemPrompt = (string) config('chatbot.system_prompt');
    }

    /**
     * @param array<int, array{role: string, text: string}> $history
     */
    public function reply(array $history, string $message): string
    {
        if ($this->apiKey === '') {
            throw new RuntimeException(
                'Chatbot is not configured. Add OPENAI_API_KEY to your .env file.'
            );
        }

        $input = collect($history)
            ->filter(fn (array $turn) => isset($turn['text']) && trim($turn['text']) !== '')
            ->map(fn (array $turn) => [
                'role' => $turn['role'] === 'assistant' ? 'assistant' : 'user',
                'content' => $turn['text'],
            ])
            ->push([
                'role' => 'user',
                'content' => $message,
            ])
            ->values()
            ->all();

        try {
            $response = Http::timeout(60)
                ->connectTimeout(15)
                ->withToken($this->apiKey)
                ->acceptJson()
                ->post("{$this->baseUrl}/responses", [
                    'model' => $this->model,

                    'instructions' => $this->systemPrompt,

                    'input' => $input,

                    /*
                     * This is an FAQ/support chatbot, so we don't need
                     * extended reasoning for every request.
                     */
                    'reasoning' => [
                        'effort' => 'none',
                    ],

                    /*
                     * Keep the chatbot answers short and readable.
                     */
                    'text' => [
                        'verbosity' => 'low',
                    ],

                    'max_output_tokens' => 300,

                    /*
                     * We already send the conversation history ourselves.
                     * Don't persist the response on OpenAI's side.
                     */
                    'store' => false,
                ]);
        } catch (\Throwable $e) {
            Log::error('OpenAI chatbot connection failed', [
                'message' => $e->getMessage(),
            ]);

            throw new RuntimeException(
                'The chatbot is temporarily unavailable. Please try again in a moment.'
            );
        }

        if (! $response->successful()) {
            $errorMessage = $response->json('error.message')
                ?? 'Unknown OpenAI API error.';

            Log::error('OpenAI chatbot request failed', [
                'status' => $response->status(),
                'error' => $errorMessage,
            ]);

            /*
             * Don't expose raw API errors to website visitors.
             */
            // if ($response->status() === 429 || $response->serverError()) {
            //     throw new RuntimeException(
            //         'The chatbot is temporarily busy. Please try again in a moment.'
            //     );
            // }

            throw new RuntimeException(
                "OpenAI API error [{$response->status()}]: "
                .($response->json('error.message') ?? $response->body())
            );

            throw new RuntimeException(
                'Chatbot request failed: '.$errorMessage
            );
        }

        /*
         * The Responses API exposes the generated text as output_text.
         */
        $text = $response->json('output_text');

        /*
         * Fallback in case output_text is not present in the response.
         */
        if (! is_string($text) || trim($text) === '') {
            $text = collect($response->json('output', []))
                ->filter(fn ($item) => ($item['type'] ?? '') === 'message')
                ->flatMap(fn ($item) => $item['content'] ?? [])
                ->filter(fn ($part) => ($part['type'] ?? '') === 'output_text')
                ->pluck('text')
                ->filter()
                ->implode("\n");
        }

        if (trim((string) $text) === '') {
            Log::error('OpenAI returned no chatbot text', [
                'response' => $response->json(),
            ]);

            throw new RuntimeException(
                'Chatbot returned an empty reply.'
            );
        }

        return trim($text);
    }
}