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
            'nom' => 'ASI 19-21 A1',
            'date_debut' => '2019',
            'date_fin' => "2020",
            "promotion_id" => "1",
            'created_at' => now()
        ]);
        DB::table('periodes')->insert([
            'nom' => 'ASI 19-21 A2',
            'date_debut' => '2020',
            'date_fin' => "2021",
            "promotion_id" => "1",
            'created_at' => now()
        ]);
        DB::table('periodes')->insert([
            'nom' => 'ASI 20-22 A1',
            'date_debut' => '2020',
            'date_fin' => "2021",
            "promotion_id" => "2",
            'created_at' => now()
        ]);
        DB::table('periodes')->insert([
            'nom' => 'ASI 20-22 A2',
            'date_debut' => '2021',
            'date_fin' => "2022",
            "promotion_id" => "3",
            'created_at' => now()
        ]);
        DB::table('periodes')->insert([
            'nom' => 'ASI 21-23 A1',
            'date_debut' => '2021',
            'date_fin' => "2022",
            "promotion_id" => "2",
            'created_at' => now()
        ]);
        DB::table('periodes')->insert([
            'nom' => 'ASI 21-23 A2',
            'date_debut' => '2022',
            'date_fin' => "2023",
            "promotion_id" => "3",
            'created_at' => now()
        ]);
    }
}
