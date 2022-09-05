<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'nom_produit',
        'type_produit',
        'description',
        'quantité',
        'categorieId',
        'prix',
        'userId',
    ];
    public function categorie(){
        return $this->belongsTo(category::class, 'categorieId');
    }
}
