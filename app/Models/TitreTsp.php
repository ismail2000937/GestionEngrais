<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitreTSP extends Model
{
    use HasFactory;
    protected $table = 'titre_tsps';
    protected $fillable = [	'H2O', 'AL_T' ,'P2O5_SE_T','P2O5_SE_CIT' ,'TOT' ,'h2O_T' ,'H2O_B' , 'heure', 'saiseur', 'id_tsp'];
    protected $primaryKey = 'id_titsp';
    protected $keyType = 'string';
    protected $foreignKey = 'id_tsp';
}