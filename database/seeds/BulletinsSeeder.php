<?php

use Illuminate\Database\Seeder;

class BulletinsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bulletins')->insert([
            'nom' => 'Bulletin de emma',
            'date' => '01/01/2021',
            'moyenne' => "0",
            'eleve_id' => "1",
            'created_at' => now()
        ]);
    }
}
