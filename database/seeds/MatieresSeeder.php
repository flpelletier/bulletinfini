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
            'groupe_matiere_id' => "1",
            'promotion_id'=> "1",
            'prof_id'=>"1",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'mathe',
            'coefficient' => "12",
            'groupe_matiere_id' => "1",
            'promotion_id'=> "1",
            'prof_id'=>"2",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'dev',
            'coefficient' => "12",
            'groupe_matiere_id' => "1",
            'promotion_id'=> "1",
            'prof_id'=>"3",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'linux',
            'coefficient' => "12",
            'groupe_matiere_id' => "1",
            'promotion_id'=> "1",
            'prof_id'=>"4",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'anglais',
            'coefficient' => "12",
            'groupe_matiere_id' => "1",
            'promotion_id'=> "1",
            'prof_id'=>"5",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'réseaux',
            'coefficient' => "12",
            'groupe_matiere_id' => "1",
            'promotion_id'=> "1",
            'prof_id'=>"6",
            'created_at' => now()
        ]);
    }
}
