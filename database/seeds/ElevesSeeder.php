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
            'nom' => 'richard',
            'prenom' => 'julian',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'buffard',
            'prenom' => 'hugo',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'leveille',
            'prenom' => 'tristan',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'diziere',
            'prenom' => 'emma',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'chosson',
            'prenom' => 'alexis',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'mazoyer',
            'prenom' => 'geoffrey',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'payet',
            'prenom' => 'damien',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'clerc',
            'prenom' => 'rayane',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'franceschi',
            'prenom' => 'marc',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'pelletier',
            'prenom' => 'florent',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'rouget',
            'prenom' => 'theo',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
        DB::table('eleves')->insert([
            'nom' => 'labruny',
            'prenom' => 'arthur',
            'promotion_id' => '1',
            'created_at' => now()
        ]);

    }
}
