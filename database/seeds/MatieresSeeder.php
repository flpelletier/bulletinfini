<?php

use Illuminate\Database\Seeder;

class MatieresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matieres')->insert([
            'intitule' => 'réseaux',
            'coefficient' => "12",
            'groupe-matiere_id' => "1",
            'promotion_id'=> "1",
            'created_at' => now()
        ]);
    }
}
