<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationOption extends Model
{
    use HasFactory;

    protected $fillable = ['variation_id', 'value'];

    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }

    public function productItems()
    {
        return $this->belongsToMany(ProductItem::class, 'product_configurations');
    }
}
