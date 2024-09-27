<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPointPurchase extends Model
{
    use HasFactory;
    protected $table = 'user_point_purchases';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'point_purchase_id',
        'amount_paid',
        'points_received',
        'payment_method',
        'payment_status',
        'payment_approve_date',
        'transaction_id',
        'currency_name',
    ];



    // Userモデルとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // PointPurchaseモデルとのリレーション
    public function pointPurchase()
    {
        return $this->belongsTo(PointPurchase::class);
    }
}
