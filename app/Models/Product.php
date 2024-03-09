<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'product_category_id', 'product_brand_id', 'price', 'description', 'total_rate'];


    protected $hidden = ['created_at', 'updated_at'];



    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_products')->withPivot('quantity');
    }
    public function category()
    {
        return $this->belongsTo(ProductCategory::class ,'product_category_id');
    }
    public function brand()
    {
        return $this->belongsTo(ProductBrand::class ,'product_brand_id');
    }



}
