<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SortieGranul extends Model
{
    use HasFactory;
    protected $table = 'sortie_granuls';
    protected $fillable = ['AL', 'P2O5_SE ','H2O', 'heure', 'saiseur', 'id_tsp'];
    protected $primaryKey = 'id_sortie';
    protected $keyType = 'string';
    protected $foreignKey = 'id_tsp';
}