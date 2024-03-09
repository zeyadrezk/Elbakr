<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;


    protected $fillable = ['area_id', 'city_id', 'town_id', 'street', 'building_num', 'landmark', 'user_id'];


    protected $hidden = ['created_at', 'updated_at'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function town()
    {
        return $this->belongsTo(Town::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
