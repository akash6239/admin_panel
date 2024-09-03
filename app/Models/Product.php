<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_slug',
        'sku',
        'sale_price',
        'regular_price',
        'product_packaging',
        'product_composition',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'product_image',
        // 'product_gallery',
        'meta_image',
        'status',
        'description',
    ];
    public function categories(){
        return $this->belongsToMany(Category::class,'product_categories','product_id','category_id');
    }
}
