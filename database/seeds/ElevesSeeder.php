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
            'nom' => 'emma',
            'prenom' => 'bodins',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
    }
}
