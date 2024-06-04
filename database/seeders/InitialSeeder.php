<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        User::create([
            'name'=>'Amoros',
            'email'=>'amoros@gmail.com',
            'role'=>'Enseignant',
            'password'=>Hash::make('amoros'),
        ]);

    }
}
