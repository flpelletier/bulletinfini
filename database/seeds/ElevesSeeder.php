<?php

use Illuminate\Database\Seeder;

class ElevesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eleves')->insert([
            'nom' => 'BUFFARD',
            'prenom' => 'Hugo',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'CHOSSON',
            'prenom' => 'Alexis',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'CLERC',
            'prenom' => 'Rayane',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'CUZEAU',
            'prenom' => 'Corentin',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'DIZIERE',
            'prenom' => 'Emma',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'FRANCHESCHI',
            'prenom' => 'Marc',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'LABRUNIE',
            'prenom' => 'Arthur',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'LEVEILLE',
            'prenom' => 'Tristan',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'MAZOYER',
            'prenom' => 'Geoffrey',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'OUTHIER',
            'prenom' => 'Loic',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'PAYET',
            'prenom' => 'Damien',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'PELLETIER',
            'prenom' => 'Florent',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'RICHARD',
            'prenom' => 'Julien',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'ROUGET',
            'prenom' => 'Théo',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
    }
}
