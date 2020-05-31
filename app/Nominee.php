<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    protected $fillable = ['user_id','nominee'];
    public $dates = ['created_at','updated_at'];

    public function user() {
        return $this->belongsTo('App\User');
    }

}
