<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainerSessionParticapnt extends Model
{
    protected $fillable = [
        "user_id",
        "trainer_session_id"
    ];
}
