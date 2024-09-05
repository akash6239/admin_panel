<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'slug',
        'category_type',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'manage',
        'category_image',
        'status',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_categories','category_id','product_id');
    }
    public function blogs()
    {
        return $this->belongsToMany(Blog::class,'category_blogs','blog_id','category_id');
    }
}
