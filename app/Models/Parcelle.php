<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcelle extends Model
{
    use HasFactory;

    protected $fillable = [
        'personne_id', 'numero_police', 'superficie', 'ville', 'lotissement', 'coordonnees_xy'
    ];

    public function personne()
    {
        return $this->belongsTo(Personne::class);
    }
}
