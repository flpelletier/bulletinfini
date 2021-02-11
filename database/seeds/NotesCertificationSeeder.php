<?php

use Illuminate\Database\Seeder;

class NotesCertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes_certifications')->insert([
            'matiere' => "Soutenance orale",
            'coefficient' => 12,
            'created_at' => now()
        ]);
        DB::table('notes_certifications')->insert([
            'matiere' => "Projet pédagogique",
            'coefficient' => 3,
            'created_at' => now()
        ]);
        DB::table('notes_certifications')->insert([
            'matiere' => "Evaluation entreprise",
            'coefficient' => 6,
            'created_at' => now()
        ]);
    }
}
