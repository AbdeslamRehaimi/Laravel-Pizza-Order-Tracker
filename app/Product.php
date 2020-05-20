<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function getOldPrix(){
        $Prix = $this->Prix;
        return number_format($Prix, 2, ',', ' ') . ' $';
    }
    public function getNewrix(){
        $Prix = $this->Prix - $this->Prix * $this->Remise / 100;
        return number_format($Prix, 2, ',', ' ') . ' $';
    }

    public function categories(){
        return $this->belongsTo('App\Categorie', 'catID');
    }


}
