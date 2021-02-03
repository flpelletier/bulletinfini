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
            'nom' => 'COURBEZ',
            'prenom' => 'Julian',
            'genre' => "Homme",
            'created_at' => now()
        ]);
        DB::table('profs')->insert([
            'nom' => 'DUBIEF',
            'prenom' => 'Géry',
            'genre' => "Homme",
            'created_at' => now()
        ]);
        DB::table('profs')->insert([
            'nom' => 'GOMEZ',
            'prenom' => 'Paulette',
            'genre' => "Femme",
            'created_at' => now()
        ]);
        DB::table('profs')->insert([
            'nom' => 'PERNELLE',
            'prenom' => 'Sébastien',
            'genre' => "Homme",
            'created_at' => now()
        ]);
        DB::table('profs')->insert([
            'nom' => 'TAHRAOUI',
            'prenom' => 'Fatna',
            'genre' => "Femme",
            'created_at' => now()
        ]);
        DB::table('profs')->insert([
            'nom' => 'GOETGHEBEUR',
            'prenom' => 'Ferdinand',
            'genre' => "Homme",
            'created_at' => now()
        ]);
        DB::table('profs')->insert([
            'nom' => 'GRANDHAY',
            'prenom' => 'Dorian',
            'genre' => "Homme",
            'created_at' => now()
        ]);
        DB::table('profs')->insert([
            'nom' => 'BOETSCH',
            'prenom' => 'Sébastien',
            'genre' => "Homme",
            'created_at' => now()
        ]);
        DB::table('profs')->insert([
            'nom' => 'EJUPI',
            'prenom' => 'Békim',
            'genre' => "Homme",
            'created_at' => now()
        ]);
        DB::table('profs')->insert([
            'nom' => 'SCHNEUWLY',
            'prenom' => 'Olivier',
            'genre' => "Homme",
            'created_at' => now()
        ]);
        DB::table('profs')->insert([
            'nom' => 'MOREAU',
            'prenom' => 'Anouck',
            'genre' => "Homme",
            'created_at' => now()
        ]);
    }
}
