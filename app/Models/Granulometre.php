<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Granulometre extends Model
{
    use HasFactory;
    protected $table = 'granulometres';
    protected $fillable = [	'sup_5', 'sup_4_74' ,'sup_4' ,'sup_3_15' ,'sup_2_5' ,'sup_2' ,'sup_1', 'heure', 'saiseur', 'id_produit'];
    protected $primaryKey = 'id_gran';
    protected $keyType = 'string';
    protected $foreignKey = 'id_produit';
}
