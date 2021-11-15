<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'picture',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Helper function to get all questions of this user
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Helper function to get all answers of this user
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function votes(){
        return $this->belongsToMany(Question::class, 'user_question', 'user_id');
    }

    /**
     * Mutates password during assignment
     * @param  string  $password
     */
    public function setPasswordAttribute(string $password){
        $this->attributes['password'] = bcrypt($password);
    }
}
