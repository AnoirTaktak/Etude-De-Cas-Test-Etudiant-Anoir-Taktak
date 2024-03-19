<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spectacle extends Model
{
    use HasFactory;

    protected $primaryKey = ['idpiece', 'datespectacle']; // Définir la clé primaire composite
    protected $fillable = ['datespectacle'];

    public function piece()
    {
        return $this->belongsTo(Piece::class, 'idpiece', 'id');
    }

    public function salle()
    {
        return $this->belongsTo(Salle::class, 'idsalle', 'id');
    }
}
