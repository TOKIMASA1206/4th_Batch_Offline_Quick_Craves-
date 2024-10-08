<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'invoice_id',
        'discount',
        'subtotal',
        'grand_total',
        'product_qty',
        'payment_method',
        'payment_status',
        'payment_approve_date',
        'transaction_id',
        'coupon_info',
        'currency_name',
        'order_status',
        'earned_stamps',
        'voucher_id', 
    ];


    function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }
}
