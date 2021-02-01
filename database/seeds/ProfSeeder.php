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
            'nom' => 'julian',
            'prenom' => 'courbez',
            'genre' => "homme",
            'created_at' => now()
        ]);
    }
}
