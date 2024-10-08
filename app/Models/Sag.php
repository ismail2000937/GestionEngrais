<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sag extends Model
{
    use HasFactory;
    protected $table = 'sags';
    protected $fillable = ['sag_rm', 'heure', 'saiseur', 'id_produit'];
    protected $primaryKey = 'id_sag';
    protected $keyType = 'string';
    protected $foreignKey = 'id_produit';
}
