<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoBat extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_batiment',
        'type',
        'surface',
        'usage',
        'adresse',
        'coordonnees_xy',
    ];
}
