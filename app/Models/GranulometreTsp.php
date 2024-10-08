<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GranulometreTsp extends Model
{
    use HasFactory;
    protected $table = 'granulometres_tsps';
    protected $fillable = [	'sup_6_3', 'sup_5' ,'sup_4' ,'sup_3_15' ,'sup_2_5' ,'sup_2' ,'sup_1', 'heure', 'saiseur', 'id_tsp'];
    protected $primaryKey = 'id_grantsp';
    protected $keyType = 'string';
    protected $foreignKey = 'id_tsp';
}