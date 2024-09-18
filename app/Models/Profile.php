<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // これを追加
        'phone',
        'avatar',
        'gender',
        'age',
    ];


    public function user()
{
    return $this->belongsTo(User::class);
}
}
