<?php

namespace App\Listeners;


use App\Events\PointPurchaseUpdate as EventsPointPurchaseUpdate;
use App\Models\UserPoint;
use App\Models\UserPointPurchase;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PointPurchaseUpdate
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
        
    }

    /**
     * Handle the event.
     */
public function handle(EventsPointPurchaseUpdate $event): void
{
    $purchaseId = $event->purchaseId;
    $pointPurchase = UserPointPurchase::find($purchaseId);
    $pointPurchase->payment_method = $event->paymentMethod;
    $pointPurchase->payment_status = $event->paymentInfo['status'];
    $pointPurchase->payment_approve_date = now();
    $pointPurchase->transaction_id = $event->paymentInfo['transaction_id'];
    $pointPurchase->currency_name = $event->paymentInfo['currency'];
    $pointPurchase->save();

    // 支払いが成功した場合、ユーザーのポイント残高を更新
    if ($pointPurchase->payment_status === 'completed') {
        $user = $pointPurchase->user;

        // ユーザーのポイント情報を取得または作成
        $userPoint = $user->points;
        if ($userPoint) {
            // 既存のポイント残高に購入したポイントを追加
            $userPoint->point_balance += $pointPurchase->points_received;
        } else {
            // ユーザーがポイント情報を持っていない場合、新規作成
            $userPoint = new UserPoint();
            $userPoint->user_id = $user->id;
            $userPoint->point_balance = $pointPurchase->points_received;
        }
        $userPoint->save();
    }
}

}
