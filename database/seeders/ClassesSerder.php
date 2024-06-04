<?php

namespace Database\Seeders;

use App\Models\Classe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesSerder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classes')->delete();
        Classe::create([
            'label'=>'6eme',
            'prix'=>2500,
            'option'=>'1',
            'cycle'=>'Premier',
            'statut'=>'ouverte',
        ]);
        Classe::create([
            'label'=>'2nd',
            'prix'=>2500,
            'option'=>'C',
            'cycle'=>'Second',
            'statut'=>'ouverte',
        ]);
        Classe::create([
            'label'=>'Terminal',
            'prix'=>65000,
            'option'=>'A',
            'cycle'=>'Second',
            'statut'=>'ouverte',
        ]);
    }
}
