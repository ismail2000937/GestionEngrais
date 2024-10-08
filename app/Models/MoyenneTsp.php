<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoyenneTsp extends Model
{
    use HasFactory;
    protected $table = 'moyenne_tsps';
    protected $primaryKey = 'id_moytsp';

    protected $foreignKey = 'id_tsp';
    protected $fillable = [	'AL', 'P2O5_SE' ,'p2O5_SE_C','TOT', 'H2O_T'	,'H2O_B' ,'sup_6_3' , 'sup_5' ,'sup_4' ,'sup_3_15' ,'sup_2_5' ,'sup_2' ,'sup_1', 'date_saisi', 'saiseur', 'id_tsp'];
    
}
