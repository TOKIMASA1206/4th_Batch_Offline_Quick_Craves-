<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile; // Profile モデルをインポート
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ユーザーを作成
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'User',
                'email' => 'user@email.com',
                'role' => 'user',
                'password' => Hash::make('password'),
            ]
        ];

        foreach ($users as $userData) {
            $user = User::create($userData);
            
            // プロファイルを作成
            Profile::create([
                'user_id' => $user->id,
                'phone' => null,
                'avatar' => '/uploads/avatar.jpg', // デフォルト値を設定
                'gender' => null,
                'age' => null,
            ]);
        }
    }
}
