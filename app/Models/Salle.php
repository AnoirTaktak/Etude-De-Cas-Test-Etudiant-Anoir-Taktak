<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;
    protected $fillable = ['libelle', 'adresse'];

    protected $primaryKey = 'id'; // Définir la clé primaire explicite pour la table salles

    public function spectacles()
    {
        return $this->hasMany(Spectacle::class, 'idsalle', 'id');
    }
}
