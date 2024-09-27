<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointPurchase extends Model
{
    use HasFactory;
    protected $table = 'point_purchases';

    public $timestamps = true;

    public function userPointPurchases()
    {
        return $this->hasMany(UserPointPurchase::class);
    }
}
