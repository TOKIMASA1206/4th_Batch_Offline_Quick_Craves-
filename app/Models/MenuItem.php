<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuItem extends Model
{
    use HasFactory;

    function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }

    function menuSizes() : HasMany {
        return $this->hasMany(MenuSize::class);
    }

    function menuOptions() : HasMany {
        return $this->hasMany(MenuOption::class);
    }
}
