<?php

use Illuminate\Database\Seeder;

class ProfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profs')->insert([
            'nom' => 'courbez',
            'prenom' => 'julian',
            'genre' => "homme",
            'created_at' => now()
        ]);
        DB::table('profs')->insert([
            'nom' => 'dubief',
            'prenom' => 'gery',
            'genre' => "homme",
            'created_at' => now()
        ]);
        DB::table('profs')->insert([
            'nom' => 'gomez',
            'prenom' => 'paulette',
            'genre' => "femme",
            'created_at' => now()
        ]);
        DB::table('profs')->insert([
            'nom' => 'pernelle',
            'prenom' => 'sebastien',
            'genre' => "homme",
            'created_at' => now()
        ]);
        DB::table('profs')->insert([
            'nom' => 'julian',
            'prenom' => 'courbez',
            'genre' => "homme",
            'created_at' => now()
        ]);
        DB::table('profs')->insert([
            'nom' => 'ferdi',
            'prenom' => 'goetchebeur',
            'genre' => "homme",
            'created_at' => now()
        ]);
        DB::table('profs')->insert([
            'nom' => 'dorian',
            'prenom' => 'grandhay',
            'genre' => "homme",
            'created_at' => now()
        ]);
    }
}
