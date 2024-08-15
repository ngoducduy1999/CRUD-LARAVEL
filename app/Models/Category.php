<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'parent_category_id'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function childCategories()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }

    public function variations()
    {
        return $this->hasMany(Variation::class);
    }

    public function promotions()
    {
        return $this->belongsToMany(Promotion::class, 'promotion_categories');
    }
}
