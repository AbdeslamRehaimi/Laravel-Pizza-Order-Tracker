<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    //
    public function products(){
        return $this->belongsTo('App\Product', 'codeProduit');
    }

    public function clients(){
        return $this->belongsTo('App\Client', 'numClient');
    }
}
