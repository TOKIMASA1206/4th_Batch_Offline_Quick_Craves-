<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'show_at_home', 'status'];

    function menuItems() {
        return $this->hasMany(MenuItem::class);
    }
}
