<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class d03 extends Model
{
    use HasFactory;
    protected $table = 'd03s';
    protected $fillable = ['d03_rm', 'd03_densite', 'heure', 'saiseur', 'id_produit'];
    protected $primaryKey = 'id_d03';
    protected $keyType = 'string';
    protected $foreignKey = 'id_produit';
}
