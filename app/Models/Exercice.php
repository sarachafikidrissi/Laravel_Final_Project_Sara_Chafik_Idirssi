<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    protected $fillable = [
        "user_id",
        "name",
        "image",
        "calories",
    ];


    public function trainerSessions() {
        return $this->belongsToMany(TrainerSession::class, 'trainer_session_exercices');
    }

    public function completedUsers() {
        return $this->belongsToMany(User::class, 'completed_exercices');
    }
}
