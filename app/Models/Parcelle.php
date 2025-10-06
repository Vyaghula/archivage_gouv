<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcelle extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_police',
        'superficie',
        'ville',
        'lotissement',
        'coordonnees_xy',
    ];
}
