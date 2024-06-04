<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'numero',
        'age',
        'sexe',
        'enseignant',
        'situation',
        'statut',
        'email',
        'password',
    ];
}
