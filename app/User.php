<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lname', 'fname', 'username', 'email', 'password', 'institution', 'designation', 'phone', 'role'
    ];

    public $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function active() {
        return User::where('active', 1)
            ->orderBy('lname')->orderBy('fname')
            ->get();
    }

    public function nominations($electionId) {
        return Nomination::where('election_id', $electionId)
            ->where('user_id', $this->id)
            ->with('user')
            ->get();
    }

    public function nominationCount($electionId) {
        return Nomination::where('election_id',$electionId)
            ->where('nominee', $this->id)->count();
    }
}
