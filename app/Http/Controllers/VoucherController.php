<?php

namespace App\Http\Controllers;

use App\DataTables\VouchersDataTable;
use App\Http\Requests\Admin\VoucherCreateRequest;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(VouchersDataTable $dataTable)
    {
        //
        return $dataTable->render('admin.voucher.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.voucher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VoucherCreateRequest $request)
    {
        //
        try {
            $voucher = new Voucher();
            $voucher->name = $request->name;
            $voucher->code = $request->code;
            $voucher->discount_value = $request->discount_value;
            $voucher->expiry_date = $request->expiry_date;
            $voucher->status = $request->status;
            $voucher->save();

            return to_route('admin.voucher.index')->with('success', 'voucher created successfully.');
        } catch (\Exception $e) {
            logger($e);
            // エラーメッセージをセッションにフラッシュ
            return back()->with('error', 'There was an error creating the voucher.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $voucher = Voucher::findOrFail($id);
        return view('admin.voucher.edit', compact('voucher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VoucherCreateRequest $request, $id)
    {
        try {
            // ID で対象の Voucher モデルを取得
            $voucher = Voucher::findOrFail($id);

            // モデルのプロパティをリクエストからのデータで更新
            $voucher->name = $request->name;
            $voucher->code = $request->code;
            $voucher->discount_value = $request->discount_value;
            $voucher->expiry_date = $request->expiry_date;
            $voucher->status = $request->status;
            $voucher->save();

            // 成功メッセージと共にリダイレクト
            return to_route('admin.voucher.index')->with('success', 'Voucher updated successfully.');

        } catch (\Exception $e) {
            // エラー発生時にログを記録し、エラーメッセージをセッションにフラッシュ
            logger($e);
            return back()->with('error', 'There was an error updating the voucher.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voucher $voucher)
    {
        //
        try {
            $voucher->delete();
            return  response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'something went wrong']);
        }
    }
}
