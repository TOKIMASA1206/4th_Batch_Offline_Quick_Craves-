<?php

namespace App\Http\Controllers;

use App\Http\Requests\Frontend\ProfileCreateRequest;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        $orders = Order::with('orderItems')
            ->where('user_id', Auth::user()->id)
            ->where('payment_status', 'completed')
            ->latest()
            ->get();
        return view('frontend.profile.index', compact('orders'));
    }

    public function card()
    {
        return view('frontend.card.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileCreateRequest $request)
    {
        // バリデーションされたデータを取得
        $validatedData = $request->validated();

        try {
            DB::beginTransaction();

            // 現在のユーザーとプロフィールを取得
            $user = Auth::user();
            $profile = $user->profile;

            // バリデーションデータから情報を更新
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];

            $profile->phone = $validatedData['phone'];
            $profile->gender = $validatedData['gender'];
            $profile->age = $validatedData['age'];


            if ($request->hasFile('avatar')) {
                $profile->avatar = $this->uploadImage($request, 'avatar');
            }

            $user->save();
            $profile->save();

            DB::commit();

            return redirect()->route('profile_index')->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            logger($e);
            return back()->with('error', 'There was an error updating the profile.');
        }
    }


    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'new_password.confirmed' => 'New password confirmation does not match.',
        ]);

        // 現在のパスワードのチェック
        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        try {
            // パスワードを更新
            $user = auth()->user();
            $user->password = Hash::make($request->new_password);
            $user->save();

            // 成功メッセージとともにリダイレクト
            return to_route('profile_index')->with('success', 'Password updated successfully.');
        } catch (\Exception $e) {
            logger($e);
            return back()->with('error', 'There was an error updating the password.');
        }
    }

}
