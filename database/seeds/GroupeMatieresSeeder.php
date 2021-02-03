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
            'intitule' => 'Réseaux, Systèmes et Sécurité',
            'coefficient' => 3,
            'created_at' => now()
        ]);
        DB::table('groupe_matieres')->insert([
            'intitule' => 'Génie Logiciel',
            'coefficient' => 3,
            'created_at' => now()
        ]);
        DB::table('groupe_matieres')->insert([
            'intitule' => 'Management Budgétisation et Achats',
            'coefficient' => 2,
            'created_at' => now()
        ]);
    }
}
