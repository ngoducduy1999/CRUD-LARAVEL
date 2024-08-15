<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Promotion.php
class Promotion extends Model
{
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'promotion_categories');
    }
}

