<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagesHandle extends Model
{   

    protected $primaryKey = 'idimage';
    protected $fillable = [
        'produit',
        'imagepath',
    ];
}
