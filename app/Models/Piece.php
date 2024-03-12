<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'flyer'];
    protected $primaryKey = 'id'; // Définir la clé primaire explicite pour la table pieces

    public function spectacles()
    {
        return $this->hasMany(Spectacle::class, 'idpiece', 'id');
    }
}
