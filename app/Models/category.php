<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_categorie',
        'abreviation',
       
        'userId',
    ];
    public function produit(){
        return $this->hasMany(Produit::class, 'produitId');
    }

}
