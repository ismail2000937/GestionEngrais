<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bouille extends Model
{
    use HasFactory;
    protected $table = 'bouilles';
    protected $fillable = ['densite', 'AL_B','P2O5_SE_B', 'heure', 'saiseur', 'id_tsp'];
    protected $primaryKey = 'id_bouillie';
    protected $keyType = 'string';
    protected $foreignKey = 'id_tsp';
}