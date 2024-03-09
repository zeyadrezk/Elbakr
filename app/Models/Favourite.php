<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id'
    ];

    protected $hidden=[
      'created_at',
      'updated_at'
    ];


    public function products()
    {
        return $this->hasManyThrough(
            Product::class,
            FavouriteProduct::class,
            'favourite_id', // Foreign key on FavouriteProduct table
            'id', // Local key on Product table
            'id', // Local key on Favourite table
            'product_id' // Foreign key on FavouriteProduct table
        );
    }
    public function accessories()
    {
        return $this->hasManyThrough(
            Accessory::class,
            FavouriteAccessory::class,
            'favourite_id', // Foreign key on FavouriteProduct table
            'id', // Local key on Product table
            'id', // Local key on Favourite table
            'accessory_id' // Foreign key on FavouriteProduct table
        );
    }
}
