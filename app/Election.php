<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $fillable = ['title','status', 'no_of_candidates', 'status_at'];

    public $dates = ['created_at','updated_at','status_at'];

    public function voters() {
        return $this->hasMany('App\Voter');
    }
}
