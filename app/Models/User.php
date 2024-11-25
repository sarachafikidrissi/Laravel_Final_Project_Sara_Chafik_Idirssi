<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'height',
        'weight',
        'gender',
        'age',
        'calories',
        "trainersRequestStatus",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roles() {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function hasRole($role)
    {
        return $this->roles()->where("role", $role)->exists();
    }

    public function payements() {
        return $this->hasMany(Payement::class);
    }

    public function joinedSessions() {
        return $this->belongsToMany(TrainerSession::class, 'trainer_session_particapnts');
    }

    public function completedExercices() {
        return $this->belongsToMany(Exercice::class, 'completed_exercices');
    }
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    // public function trainerRequests() {
    //     return $this->belongsTo(TrainerRequest::class);
    // }
}
