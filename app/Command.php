<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    //
    public function clinet(){
        return $this->belongsTo('App\Client', 'numClient');
    }
}
