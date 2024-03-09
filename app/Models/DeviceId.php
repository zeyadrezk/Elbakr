<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceId extends Model
{
    use HasFactory;


    protected $table = 'device_ids'; // Explicitly defining the table name is optional here since Laravel would automatically assume this name based on the model name.

    protected $fillable = ['fcm_token', 'user_id']; // Assuming you want these fields to be mass assignable



    protected $hidden = ['created_at', 'updated_at'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
