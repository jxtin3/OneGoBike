<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutDonationRequest;
use App\Models\Donation;
use App\Services\PayMongoDonationService;
use App\Services\PayPalDonationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DonationController extends Controller
{
    public function show(): View
    {
        return view('donate');
    }

    public function checkout(
        CheckoutDonationRequest $request,
        PayPalDonationService $paypal,
        PayMongoDonationService $paymongo,
    ): JsonResponse {
        $validated = $request->validated();
        $amountUsd = round((float) $validated['amount'], 2);
        $platformFee = round((float) ($validated['platform_fee'] ?? 0), 2);
        $usdToPhp = (float) config('donation.usd_to_php');

        $donation = Donation::create([
            'donor_type' => $validated['donor_type'],
            'org_name' => $validated['org_name'] ?? null,
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'address1' => $validated['address1'],
            'address2' => $validated['address2'] ?? null,
            'city' => $validated['city'],
            'postcode' => $validated['postcode'],
            'state' => $validated['state'],
            'country' => $validated['country'],
            'amount_usd' => $amountUsd,
            'amount_php' => round(($amountUsd + $platformFee) * $usdToPhp, 2),
            'platform_fee_usd' => $platformFee,
            'frequency' => $validated['frequency'],
            'payment_method' => $validated['payment_method'],
            'status' => 'pending',
            'receipt_email' => $validated['receipt_email'] ?? null,
        ]);

        try {
            if ($donation->payment_method === 'paypal' && $donation->frequency === 'monthly') {
                $result = $paypal->createSubscription($donation);
                $donation->update(['paypal_subscription_id' => $result['subscription_id']]);
                $redirectUrl = $result['approval_url'];
            } elseif ($donation->payment_method === 'paypal') {
                $result = $paypal->createOrder($donation);
                $donation->update(['paypal_order_id' => $result['order_id']]);
                $redirectUrl = $result['approval_url'];
            } else {
                $result = $paymongo->createCheckoutSession($donation);
                $donation->update(['paymongo_session_id' => $result['session_id']]);
                $redirectUrl = $result['checkout_url'];
            }
        } catch (\Throwable $e) {
            $donation->update(['status' => 'failed']);

            return response()->json([
                'message' => $e->getMessage(),
            ], 422);
        }

        return response()->json([
            'redirect_url' => $redirectUrl,
        ]);
    }

    public function success(
        Request $request,
        Donation $donation,
        PayPalDonationService $paypal,
        PayMongoDonationService $paymongo,
    ): View|RedirectResponse {
        if ($donation->status !== 'paid') {
            if ($donation->payment_method === 'paypal' && $donation->frequency === 'monthly' && $request->filled('subscription_id')) {
            try {
                $subscription = $paypal->getSubscriptionDetails($request->string('subscription_id')->toString());

                if ($paypal->isSubscriptionActive($subscription)) {
                    $donation->update([
                        'status' => 'paid',
                        'paypal_subscription_id' => $subscription['id'] ?? $donation->paypal_subscription_id,
                    ]);
                }
            } catch (\Throwable) {
                return redirect()
                    ->route('donate.cancel', $donation)
                    ->with('error', 'Subscription could not be confirmed. Please try again.');
            }
        } elseif ($donation->payment_method === 'paypal' && $request->filled('token')) {
            try {
                $capture = $paypal->captureOrder($request->string('token')->toString());

                if ($paypal->isCaptureSuccessful($capture)) {
                    $donation->update([
                        'status' => 'paid',
                        'paypal_order_id' => $capture['id'] ?? $donation->paypal_order_id,
                    ]);
                }
            } catch (\Throwable) {
                return redirect()
                    ->route('donate.cancel', $donation)
                    ->with('error', 'Payment could not be confirmed. Please try again.');
            }
        } elseif ($donation->paymongo_session_id) {
                $session = $paymongo->retrieveCheckoutSession($donation->paymongo_session_id);

                if ($paymongo->isSessionPaid($session)) {
                    $paymentId = $session['attributes']['payments'][0]['id'] ?? null;
                    $donation->markPaid($paymentId);
                }
            }
        }

        if ($donation->fresh()->status !== 'paid') {
            return redirect()
                ->route('donate.cancel', $donation)
                ->with('error', 'Payment is still pending or was not completed.');
        }

        return view('donate', [
            'paidDonation' => $donation->fresh(),
        ]);
    }

    public function cancel(Donation $donation): View
    {
        if ($donation->status === 'pending') {
            $donation->update(['status' => 'cancelled']);
        }

        return view('donate', [
            'cancelledDonation' => $donation,
        ]);
    }
}
