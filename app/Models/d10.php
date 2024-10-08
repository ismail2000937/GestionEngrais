<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class d10 extends Model
{
    use HasFactory;
    protected $table = 'd10s';
    protected $fillable = ['d10_ph', 'heure', 'saiseur', 'id_produit'];
    protected $primaryKey = 'id_d10';
    protected $keyType = 'string';
    protected $foreignKey = 'id_produit';
}
