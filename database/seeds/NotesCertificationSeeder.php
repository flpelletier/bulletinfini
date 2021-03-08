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
            'type' => 'entreprise',
            'created_at' => now()
        ]);
        DB::table('notes_certifications')->insert([
            'matiere' => "Projet pédagogique",
            'coefficient' => 3,
            'type' => 'scolaire',
            'created_at' => now()
        ]);
        DB::table('notes_certifications')->insert([
            'matiere' => "Evaluation entreprise",
            'coefficient' => 6,
            'type' => 'entreprise',
            'created_at' => now()
        ]);
    }
}
