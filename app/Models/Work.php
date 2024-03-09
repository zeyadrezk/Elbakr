<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;


    protected $fillable = ['image', 'description', 'type'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
