<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    public $timestamps = false;

    public function meet() {
        return $this->belongsTo('App\Meet');
    }
}
