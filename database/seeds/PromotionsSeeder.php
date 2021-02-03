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
            'intitule' => 'ASI 19-21',
            'annee' => '2019 - 2021',
            'created_at' => now()
        ]);
        DB::table('promotions')->insert([
            'intitule' => 'ASI 20-22',
            'annee' => '2020 - 2022',
            'created_at' => now()
        ]);
        DB::table('promotions')->insert([
            'intitule' => 'ASI 21-23',
            'annee' => '2022 - 2023',
            'created_at' => now()
        ]);
    }
}
