<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $fillable = ['title','status','status_at'];

    public $dates = ['created_at','updated_at','status_at'];

    public function voters() {
        return $this->hasMany('App\Voter');
    }
}
