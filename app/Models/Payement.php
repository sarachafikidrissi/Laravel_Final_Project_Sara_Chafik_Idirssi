<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    protected $fillable = [
        "user_id",
        "status"
    ];

    public function userPayement(){
        return $this->belongsTo(User::class);
    } 
}