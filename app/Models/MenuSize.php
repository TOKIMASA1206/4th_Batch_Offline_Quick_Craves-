<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuSize extends Model
{
    use HasFactory;

    function menuItem() : BelongsTo {
        return $this->belongsTo(MenuItem::class);
    }
}
