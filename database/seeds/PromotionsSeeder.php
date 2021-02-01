<?php

use Illuminate\Database\Seeder;

class PromotionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->insert([
            'intitule' => 'asi',
            'annee' => '2019 - 2021',
            'created_at' => now()
        ]);
    }
}
