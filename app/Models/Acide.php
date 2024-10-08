<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acide extends Model
{
    use HasFactory;
    
    protected $table = 'acides';
    protected $primaryKey = 'id_acide';
    protected $keyType = 'string';
    
    protected $fillable = [
        'Ref_bac', 'nom_produit', 'densite', 'temperature', 'P2O5', 'TS', 'SO4', 'cd', 'Mgo', 'Zn', 'heure', 'saiseur', 'id_produit', 'id_tsp'
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit');
    }

    public function tspProduit()
    {
        return $this->belongsTo(TSPProduit::class, 'id_tsp');
    }
}
