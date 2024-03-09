<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartAccssory extends Model
{
    use HasFactory;


    protected $fillable = ['cart_id', 'quantity', 'accessory_id'];

    protected $hidden = ['created_at', 'updated_at'];


    public function accessories()
    {
        return $this->hasMany(CartAccessory::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_accessories')->withPivot('quantity');
    }




}
