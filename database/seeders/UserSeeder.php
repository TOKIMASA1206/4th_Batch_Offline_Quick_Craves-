<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile; // Profile モデルをインポート
use DB;
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
        DB::table('users')->insert([
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
        ]);

        $users = User::all();

        foreach ($users as $user) {
            Profile::create([
                'user_id' => $user->id,
                'phone' => null,
                'avatar' => null,
                'gender' => null,
                'age' => null,
            ]);
        }
    }
}
