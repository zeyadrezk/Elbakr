<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'percent', 'start_date', 'end_date', 'Max_value'];


    protected $hidden = ['created_at', 'updated_at'];


}
