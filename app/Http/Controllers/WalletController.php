<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Point;
use App\Models\UserPointPurchase;
use App\Models\Voucher;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class WalletController extends Controller
{
    function index(): View
    {
        $points = Point::all();
        $vouchers = Voucher::all();
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();
        $purchasedPoints = UserPointPurchase::where('user_id', $user->id)->get();
        $stampCount = $user->stamp->stamp_count ?? 0;
        $totalStamps = 10;

        // トランザクションリストの作成
        $transactions = collect();

        // 注文データをトランザクションリストに追加
        foreach ($orders as $order) {
            // STAMP トランザクション
            if ($order->earned_stamps > 0) {
                $transactions->push([
                    'type' => 'stamp',
                    'payment_status' => $order->payment_status,
                    'payment_method' => $order->payment_method,
                    'payment_approve_date' => $order->payment_approve_date,
                    'stamps' => $order->earned_stamps,
                    'created_at' => $order->payment_approve_date,
                ]);
            }

            // PAY WITH [PAYMENT_METHOD] トランザクション
            $transactions->push([
                'type' => 'payment',
                'payment_status' => $order->payment_status,
                'payment_method' => $order->payment_method,
                'payment_approve_date' => $order->payment_approve_date,
                'grand_total' => $order->grand_total,
                'currency_name' => $order->currency_name,
                'created_at' => $order->payment_approve_date,
            ]);

            // VOUCHER トランザクション
            if (!empty($order->voucher_id)) {
                $transactions->push([
                    'type' => 'voucher',
                    'payment_status' => $order->payment_status,
                    'voucher_name' => $order->voucher->name,
                    'created_at' => $order->created_at,
                ]);
            }
        }

        // ポイント購入データをトランザクションリストに追加
        foreach ($purchasedPoints as $purchase) {
            $transactions->push([
                'type' => 'point_purchase',
                'payment_status' => $purchase->payment_status,
                'payment_method' => $purchase->payment_method,
                'payment_approve_date' => $purchase->payment_approve_date,
                'amount_paid' => $purchase->amount_paid,
                'points_received' => $purchase->points_received,
                'currency_name' => $purchase->currency_name,
                'transaction_id' => $purchase->transaction_id,
                'created_at' => $purchase->payment_approve_date,
            ]);
        }

        // トランザクションを日付順にソート（最新順）
        $transactions = $transactions->sortByDesc('created_at');

        // ページネーションの処理
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $transactions->slice(($currentPage - 1) * $perPage, $perPage)->all();

        // LengthAwarePaginatorを作成
        $paginatedTransactions = new LengthAwarePaginator(
            $currentPageItems, // 現在のページに表示するアイテム
            $transactions->count(), // 全アイテム数
            $perPage, // 1ページあたりのアイテム数
            $currentPage, // 現在のページ
            ['path' => request()->url(), 'query' => request()->query()] // ページネーションリンク用のURL
        );

        return view('frontend.wallet.index', compact(
            'points',
            'vouchers',
            'stampCount',
            'totalStamps',
            'paginatedTransactions',
        ));
    }

    public function pointStore(Request $request)
    {
        //
        dd($request->all());
    }
}
