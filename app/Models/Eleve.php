<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'numero',
        'sexe',
        'date_naissance',
        'lieu_naissance',
        'statut_social',
        'statut_familliale',
        'photo',
    ];
}
