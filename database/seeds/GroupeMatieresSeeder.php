<?php

use Illuminate\Database\Seeder;

class GroupeMatieresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groupe_matieres')->insert([
            'intitule' => 'réseaux',
            'created_at' => now()
        ]);
    }
}
