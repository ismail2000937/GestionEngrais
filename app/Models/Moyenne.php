<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moyenne extends Model
{
    use HasFactory;
    protected $table = 'moyennes';
    protected $fillable = [	'ammonical', 'p2o5' ,'p2o5_tot','p2o5_SE_C', 'h2o'	,'zn' ,'s' ,  'sup_5', 'sup_4_75' ,'sup_4' ,'sup_3_15' ,'sup_2_5' ,'sup_2' ,'sup_1', 'date_saisi', 'saiseur', 'id_produit'];
    protected $primaryKey = 'id_moy';
    protected $keyType = 'string';
    protected $foreignKey = 'id_produit';
}
