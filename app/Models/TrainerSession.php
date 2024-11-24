<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainerSession extends Model
{
    protected $fillable = [
        "user_id",
        "name",
        "description",
        "start",
        "end",
        "status",
        "price",
        "image",
        "spots"
    ];


    public function exercices() {
        return $this->belongsToMany(Exercice::class, 'trainer_session_exercices');
    }

    public function participants() {
        return $this->belongsToMany(User::class, 'trainer_session_particapnts');
    }
}
