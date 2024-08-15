<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductConfiguration extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_item_id',
        'variation_option_id',
    ];

    public function productItem()
    {
        return $this->belongsTo(ProductItem::class);
    }

    public function variationOption()
    {
        return $this->belongsTo(VariationOption::class);
    }
}
