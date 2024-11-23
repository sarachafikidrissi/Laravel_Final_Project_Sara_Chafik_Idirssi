<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainerSessionExercice extends Model
{
    protected $fillable = [
        "exercice_id",
        "trainer_session_id"
    ];
}
