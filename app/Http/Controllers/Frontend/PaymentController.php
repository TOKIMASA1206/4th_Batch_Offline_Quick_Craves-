<?php

namespace App\Http\Controllers\Frontend;

use App\Events\OrderPaymentUpdate;
use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Events\OrderPaymentUpdated;




class PaymentController extends Controller
{
    function makePayment(Request $request, OrderService $orderService)
    {
        $request->validate([
            'payment_gateway' => ['required', 'string', 'in:paypal,stripe']
        ]);

        /** Create Order  */
        if ($orderService->createOrder()) {
            // redirect user to the payment host
            switch ($request->payment_gateway) {
                case 'paypal':
                    return response(['redirect_url' => route('paypal.payment')]);
                    break;

                case 'stripe':
                    return response(['redirect_url' => route('stripe.payment')]);
                    break;

                default:
                    break;
            }
        }
    }

    /**============= Paypal Payment ====================== */

    function paymentSuccess(): View
    {
        return view('frontend.payment.success');
    }

    function paymentCancel(): View
    {
        return view('frontend.payment.cancel');
    }

    function setPaypalConfig(): array
    {
        $config = [
            'mode' => 'sandbox', // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
            'sandbox' => [
                'client_id' => 'AUmUhWNWBnRoSkRgpAB3Ofu668uvSn8JHQVTW0VT3_4W3v0R5kYyMtSGeN2-Fa7hx4gFXGxFu-kAKjZv',
                'client_secret' => 'EITpBpjK9v1QRdRKpvnpDVF--oG2KLJqa1dGzyMsqe5mw5EdKvo8XpToIlZNnWjQro7VB3Tz7gqZpJlU',
                'app_id' => 'APP-80W284485P519543T',
            ],
            'live' => [
                'client_id' => 'AUmUhWNWBnRoSkRgpAB3Ofu668uvSn8JHQVTW0VT3_4W3v0R5kYyMtSGeN2-Fa7hx4gFXGxFu-kAKjZv',
                'client_secret' => 'EITpBpjK9v1QRdRKpvnpDVF--oG2KLJqa1dGzyMsqe5mw5EdKvo8XpToIlZNnWjQro7VB3Tz7gqZpJlU',
                'app_id' => 'APP_ID'
            ],

            'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
            'currency' => 'PHP',
            'notify_url' => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
            'locale' => 'en_US', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
            'validate_ssl' => true, // Validate SSL when creating api client.
        ];

        return $config;
    }


    function payWithPaypal()
    {
        $config = $this->setPaypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        /** Calculate payable amount  */
        $grandTotal = session()->get('grand_total');
        // $payableAmount = round($grandTotal * config('gatewaySettings.paypal_rate'));

        $response = $provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('paypal.success'),
                'cancel_url' => route('paypal.cancel')
            ],
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'PHP',
                        'value' => $grandTotal,
                    ],
                ],
            ],
        ]);

        if (isset($response['id']) && $response['id'] != NULL) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('payment.cancel')->withErrors(['error' => $response['error']['message']]);
        }
    }

    function paypalSuccess(Request $request, OrderService $orderService)
    {
        $config = $this->setPaypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);
        // dd($response);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            $orderId = session()->get('order_id');
            $capture = $response['purchase_units'][0]['payments']['captures'][0];
            $paymentInfo = [
                'transaction_id' => $capture['id'],
                'currency' => $capture['amount']['currency_code'],
                'status' => 'completed',
            ];

            OrderPaymentUpdate::dispatch($orderId, $paymentInfo, 'PayPal');
            // OrderPlacedNotificationEvent::dispatch($orderId);

            /** Clear session data  */
            $orderService->clearSession();

            return redirect()->route('payment.success');
        } else {
            $this->transactionFailUpdateStatus('PayPal');
            return redirect()->route('payment.cancel')->withErrors(['error' => $response['error']['message']]);
        }
    }

    function paypalCancel()
    {
        $this->transactionFailUpdateStatus('PayPal');
        return redirect()->route('payment.cancel');
    }

    function transactionFailUpdateStatus($gatewayName): void
    {
        $orderId = session()->get('order_id');
        $paymentInfo = [
            'transaction_id' => '',
            'currency' => '',
            'status' => 'Failed',
        ];

        OrderPaymentUpdate::dispatch($orderId, $paymentInfo, $gatewayName);
    }


    /**============= Point Payment ====================== */

    public function payWithPoints(Request $request, OrderService $orderService)
    {
        DB::beginTransaction();

        try {
            $user = Auth::user();
            $cartTotal = $request->input('total');
            $userPoints = $user->points->point_balance ?? 0;

            if ($cartTotal == 0) {
                return response()->json(['success' => false, 'message' => 'Cart is empty!']);
            }

            if ($userPoints < $cartTotal) {
                return response()->json(['success' => false, 'message' => 'Not enough points']);
            }

            // 注文を作成
            if ($orderService->createOrder()) {
                $user->points->point_balance -= $cartTotal;
                $user->points->save();

                
                // 支払い情報を作成
                $orderId = session()->get('order_id');
                $paymentInfo = [
                    'transaction_id' => uniqid(),
                    'currency' => 'POINTS',
                    'status' => 'completed',
                ];
                
                OrderPaymentUpdate::dispatch($orderId, $paymentInfo, 'Point');


                // セッションのクリア
                $orderService->clearSession();

                DB::commit();


                return response()->json(['success' => true, 'message' => 'Payment successful']);
            } else {
                $this->transactionFailUpdateStatus('Point');
                throw new \Exception('Order creation failed');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            logger($e->getMessage());

            // 支払い失敗時
            $this->transactionFailUpdateStatus('Point');
            return response()->json(['success' => false, 'message' => 'Payment failed']);
        }
    }


    


}