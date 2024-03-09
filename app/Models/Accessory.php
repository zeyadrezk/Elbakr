<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    use HasFactory;



    protected $fillable = ['name', 'description', 'image', 'price'];


    protected $hidden = ['created_at', 'updated_at'];



}
