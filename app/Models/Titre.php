<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titre extends Model
{
    use HasFactory;
    protected $table = 'titres';
    protected $fillable = [	'ammonical', 'p2o5' ,'h2o'	,'zn' ,'s' ,'cd' ,'p2o5_tot' ,'temperature', 'heure', 'saiseur', 'id_produit'];
    protected $primaryKey = 'id_titre';
    protected $keyType = 'string';
    protected $foreignKey = 'id_produit';
}