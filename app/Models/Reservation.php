<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        "user_id",
        "start",
        "end"
    ];

    public function userReservations(){
        return $this->belongsTo(User::class);
    }
}
