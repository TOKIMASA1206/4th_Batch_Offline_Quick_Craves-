<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'discount_value',
        'expiry_date',
        'status',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'voucher_user');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
