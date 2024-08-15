<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sku',
        'qty_in_stock',
        'price',
        'product_image',
    ];

    public function variationOptions()
    {
        return $this->belongsToMany(VariationOption::class, 'product_configurations', 'product_item_id', 'variation_option_id');
    }

    public function productConfigurations()
    {
        return $this->hasMany(ProductConfiguration::class, 'product_item_id');
    }
}
