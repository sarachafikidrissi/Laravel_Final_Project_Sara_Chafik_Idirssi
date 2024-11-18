<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainerRequest extends Model
{
    protected $fillable = [
        "user_id",
        "status",
        "payement_id"
    ];

    public function userRequest(){
        return $this->belongsTo(User::class);
    }
}
