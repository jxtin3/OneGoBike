<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'         => ['required', 'string', 'max:100'],
            'email'        => ['required', 'email', 'max:150'],
            'subject'      => ['nullable', 'string', 'max:150'],
            'otherConcern' => ['nullable', 'string', 'max:150'],
            'phone'        => ['nullable', 'string', 'max:30'],
            'message'      => ['required', 'string', 'max:5000'],
        ]);

        ContactMessage::create([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'subject'       => $data['subject'] ?? null,
            'other_concern' => $data['otherConcern'] ?? null,
            'phone'         => $data['phone'] ?? null,
            'message'       => $data['message'],
        ]);

        return response()->json(['message' => 'Message sent.']);
    }
}