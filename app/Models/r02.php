<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class r02 extends Model
{
    use HasFactory;
    protected $table = 'r02s';
    protected $fillable = ['r02_rm', 'r02_densite', 'heure', 'saiseur', 'id_produit'];
    protected $primaryKey = 'id_r02';
    protected $keyType = 'string';
    protected $foreignKey = 'id_produit';
}
