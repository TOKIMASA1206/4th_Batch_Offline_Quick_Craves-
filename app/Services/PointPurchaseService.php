<?php

namespace App\Services;

use App\Models\UserPointPurchase; // UserPointPurchaseモデルを使用
use App\Models\PointPurchase; // PointPurchaseモデルを使用
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PointPurchaseService
{
    /** Store Point Purchase in Database  */
    public function createPointPurchase($pointId)
    {
        try {

            DB::beginTransaction();

            $pointPurchase = PointPurchase::findOrFail($pointId);

            $pointPurchaseRecord = new UserPointPurchase();
            $pointPurchaseRecord->user_id = Auth::user()->id;
            $pointPurchaseRecord->point_purchase_id = $pointPurchase->id;
            $pointPurchaseRecord->amount_paid = $pointPurchase->purchase_amount;
            $pointPurchaseRecord->points_received = $pointPurchase->bonus_points + $pointPurchase->purchase_amount;
            $pointPurchaseRecord->save();

            /** Putting the purchase ID in session */
            session()->put('purchase_id', $pointPurchaseRecord->id);

            /** Putting the total points in session */
            session()->put('total_points', $pointPurchaseRecord->points_received);

            // トランザクションをコミット
            DB::commit();

            return true;
        } catch (\Exception $e) {
            // エラーが発生した場合はロールバック
            DB::rollBack();
            logger($e);
            return false;
        }
    }

    /** Clear Session Items */
    public function clearSession()
    {
        session()->forget('purchase_id');
        session()->forget('total_points');
    }
}
