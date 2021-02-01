<?php

use Illuminate\Database\Seeder;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->insert([
            'note' => '0',
            'coefficient' => '12',
            'matiere_id' => "1",
            "eleve_id" => "1",
            "periode_id" => "1",
            'created_at' => now()
        ]);
    }
}
