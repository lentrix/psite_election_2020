<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Election extends Model
{
    protected $fillable = ['title','status', 'no_of_candidates', 'status_at'];

    public $dates = ['created_at','updated_at','status_at'];

    public function nominations() {
        return $this->hasMany('App\Nomination');
    }

    public function nominatedUsers() {
        return User::whereIn('id', Nomination::where('election_id', $this->id)->pluck('nominee'))
                ->orderBy('lname')->orderBy('fname')
                ->get();
    }
}
