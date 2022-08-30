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
        'categorieId',
        'prix',
        'userId',
    ];
}
