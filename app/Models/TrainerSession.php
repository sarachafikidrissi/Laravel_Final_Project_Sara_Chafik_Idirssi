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
}
