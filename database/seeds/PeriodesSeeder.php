<?php

use Illuminate\Database\Seeder;

class PeriodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodes')->insert([
            'nom' => 'Année 1 ',
            'date_debut' => '2019',
            'date_fin' => "2020",
            "promotion_id" => "1",
            'created_at' => now()
        ]);
    }
}
