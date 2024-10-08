<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class d09 extends Model
{
    use HasFactory;
    protected $table = 'd09s';
    protected $fillable = ['d09_rm', 'd09_densite', 'heure', 'saiseur', 'id_produit'];
    protected $primaryKey = 'id_d09';
    protected $keyType = 'string';
    protected $foreignKey = 'id_produit';
}
