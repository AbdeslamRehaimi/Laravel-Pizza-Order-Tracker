<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public function commentaires(){
        return $this->hasMany('App\Commentaire', 'numClient');
    }
}
