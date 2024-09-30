<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';


    function menuItem() : BelongsTo
    {
        return $this->belongsTo(MenuItem::class, 'menu_item_id', 'id');
    }
    public function order() {

        return $this->belongsTo(Order::class);
}
}
