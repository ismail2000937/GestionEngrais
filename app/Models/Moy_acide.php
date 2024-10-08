<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moy_acide extends Model
{
    use HasFactory;
    protected $table = 'moy_acides';
    protected $fillable = [	'densite','Tc','p2o5','TS','SO4', 'date_saisi', 'saiseur', 'id_acide'];
    protected $primaryKey = 'id_moy';
    protected $keyType = 'string';
    protected $foreignKey = 'id_acide';
}