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
            'nom' => 'asi',
            'prenom' => '2019 - 2021',
            'promotion_id' => '1',
            'created_at' => now()
        ]);
    }
}
