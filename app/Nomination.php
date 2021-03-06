<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nomination extends Model
{
    protected $fillable = ['user_id','nominee','election_id'];
    public $dates = ['created_at','updated_at'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function nominatedUser() {
        return $this->belongsTo('App\User','nominee');
    }
}
