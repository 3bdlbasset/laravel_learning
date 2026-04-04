<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tache;

class Employe extends Model
{
    use HasFactory;
    protected $table = "employes";
    protected $primaryKey = 'idemploye';

    public function getRouteKeyName()
    {
        return 'idemploye';
    }
    protected $fillable = [
        'nom' , 
        'salaire'
    ];

    public function taches(){
        return $this->hasMany(Tache::class , 'idemploye');
    }
}
