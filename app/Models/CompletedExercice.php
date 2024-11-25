<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompletedExercice extends Model
{
    protected $fillable = [
        "exercice_id",
        "user_id",
        "session_id",
        "isFavorite",
        "isCompleted"
    ];
}
