<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Log;

class OrderController extends Controller
{
    public function updateStatus(Request $request)
    {
        try {
            // リクエストデータのバリデーション
            $request->validate([
                'order_id' => 'required|integer|exists:orders,id',
                'item_id' => 'required|integer|exists:order_items,id',
                'status' => 'required|string',
            ]);

            $orderId = $request->input('order_id');
            $itemId = $request->input('item_id');
            $status = $request->input('status');

            // オーダーアイテムの取得
            $orderItem = OrderItem::where('id', $itemId)->where('order_id', $orderId)->first();

            if (!$orderItem) {
                return response()->json(['message' => 'オーダーアイテムが見つかりません。'], 404);
            }

            // ステータスの更新
            $orderItem->status = $status;
            $orderItem->save();

            TestEvent::dispatch($orderId, $itemId, $status);

            return response()->json(['message' => 'ステータスが更新され、イベントがブロードキャストされました。']);
        } catch (\Exception $e) {
            // エラーログを記録
            Log::error('Failed to update order item status: ' . $e->getMessage());

            return response()->json(['message' => 'ステータスの更新中にエラーが発生しました。'], 500);
        }
    }
}
