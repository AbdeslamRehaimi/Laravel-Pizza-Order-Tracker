<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public function commentaires(){
        return $this->hasMany('App\Commentaire', 'numClient');
    }

    public function commands(){
        return $this->HasMany('App\Command');
    }

    public function getAuthPassword()
    {
      return $this->motdepasse;
    }
}
