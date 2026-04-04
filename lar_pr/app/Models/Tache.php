<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    //



    public function employe(){
        return $this->belongsTo(Employe::class , 'idemploye' , 'idemploye');
    }
}
