<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meet extends Model
{
    public $timestamps = false;

    public function participants(){
        return $this->hasMany('App\Participant');
    }
}
