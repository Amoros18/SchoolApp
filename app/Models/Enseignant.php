<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'prenom',
        'numero',
        'matricule',
        'date_naissance',
        'sexe',
        'enseignant',
        'situation',
        'statut',
        'email',
        'password',
        'photo',
    ];
}
