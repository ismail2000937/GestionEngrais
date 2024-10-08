<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PN extends Model
{
    use HasFactory;
    protected $table = 'p_n_s';
    protected $fillable = ['pn_rm', 'pn_densite', 'heure', 'saiseur', 'id_produit'];
    protected $primaryKey = 'id_pn';
    protected $keyType = 'string';
    protected $foreignKey = 'id_produit';
}
