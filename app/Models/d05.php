<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class d05 extends Model
{
    use HasFactory;
    protected $table = 'd05s';
    protected $fillable = ['d05_rm', 'd05_densite', 'heure', 'saiseur', 'id_produit'];
    protected $primaryKey = 'id_d05';
    protected $keyType = 'string';
    protected $foreignKey = 'id_produit';
}
