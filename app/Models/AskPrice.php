<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskPrice extends Model
{
    use HasFactory;


    protected $fillable = ['ask_price_category_id', 'f_name', 'l_name', 'email', 'phone', 'message'];

    public function category()
    {
        return $this->belongsTo(AskPriceCategory::class, 'ask_price_category_id');
    }

}
