<?php

namespace App\Http\Controllers;
use App\Events\PointPurchaseUpdate;
use App\Models\PointPurchase;
use App\Models\UserPointPurchase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Services\PointPurchaseService;

class PointPurchaseController extends Controller
{
    //

    function makePayment(Request $request, PointPurchaseService $PointPurchaseService)
    {
        $request->validate([
            'payment_gateway' => ['required', 'string', 'in:paypal,stripe'],
            'selected_point_id' => ['required', 'exists:point_purchases,id'], // 追加: 選択されたポイントが存在することを確認
        ]);

        /** Create Order */
        if ($PointPurchaseService->createPointPurchase($request->selected_point_id)) { // 修正: IDを渡す
            // redirect user to the payment host
            switch ($request->payment_gateway) {
                case 'paypal':
                    return response(['redirect_url' => route('paypal.point.payment')]);
                    break;

                case 'stripe':
                    return response(['redirect_url' => route('stripe.payment')]);
                    break;

                default:
                    break;
            }
        }
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

    public function payWithPaypalPoints()
{
    // セッションから購入IDを取得
    $purchaseId = session()->get('purchase_id');
    if (!$purchaseId) {
        return redirect()->route('point.payment.cancel')->withErrors(['error' => 'No purchase found in session']);
    }

    // 購入情報をデータベースから取得
    $pointPurchaseRecord = UserPointPurchase::find($purchaseId);
    if (!$pointPurchaseRecord) {
        return redirect()->route('point.payment.cancel')->withErrors(['error' => 'Purchase record not found']);
    }

    // 金額とポイントを取得し、適切な形式にフォーマット
    $amount = number_format($pointPurchaseRecord->amount_paid, 2, '.', '');
    $points = $pointPurchaseRecord->points_received;

    $config = $this->setPaypalConfig();
    $provider = new PayPalClient($config);
    $provider->getAccessToken();

    // PayPalでの支払い処理
    $response = $provider->createOrder([
        'intent' => 'CAPTURE',
        'application_context' => [
            'return_url' => route('paypal.point.success'),
            'cancel_url' => route('paypal.point.cancel')
        ],
        'purchase_units' => [
            [
                'amount' => [
                    'currency_code' => 'PHP',
                    'value' => $amount,  // 支払金額
                ],
                'description' => "{$points} points purchase"
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
        \Log::error('PayPal CreateOrder Error', $response);
        return redirect()->route('point.payment.cancel')->withErrors(['error' => $response['message'] ?? 'Payment failed']);
    }
}



    public function paypalSuccess(Request $request, PointPurchaseService $pointPurchaseService)
    {
        $config = $this->setPaypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        // PayPalのオーダーをキャプチャ
        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            // セッションから購入IDを取得
            $purchaseId = session()->get('purchase_id');
            $capture = $response['purchase_units'][0]['payments']['captures'][0];

            // 取引情報を準備
            $paymentInfo = [
                'transaction_id' => $capture['id'],
                'currency' => $capture['amount']['currency_code'],
                'status' => 'completed',
            ];

            // UserPointPurchase テーブルの更新
            PointPurchaseUpdate::dispatch($purchaseId, $paymentInfo, 'PayPal');


            // セッションデータのクリア
            $pointPurchaseService->clearSession();

            return redirect()->route('point.payment.success')->with('success', 'ポイント購入が完了しました。');
        } else {
            $this->transactionFailUpdateStatus('PayPal');
            return redirect()->route('point.payment.cancel')->withErrors(['error' => $response['error']['message']]);
        }
    }

    public function paypalCancel()
    {
        $this->transactionFailUpdateStatus('PayPal');
        return redirect()->route('point.payment.cancel')->with('info', '支払いがキャンセルされました。');
    }


    public function transactionFailUpdateStatus($gatewayName): void
    {
        $purchaseId = session()->get('purchase_id'); // 購入IDをセッションから取得
        $paymentInfo = [
            'transaction_id' => '',
            'currency' => '',
            'status' => 'Failed',
        ];

        // UserPointPurchaseテーブルの状態を更新
        PointPurchaseUpdate::dispatch($purchaseId, $paymentInfo,$gatewayName);

    }

    
    function paymentSuccess()
    {
        return view('frontend.payment.point_success');
    }

    function paymentCancel()
    {
        return view('frontend.payment.point_cancel');
    }






}
