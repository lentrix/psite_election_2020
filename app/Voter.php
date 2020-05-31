<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    protected $fillable = ['user_id','election_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function election() {
        return $this->belongsTo('App\Election');
    }
}
