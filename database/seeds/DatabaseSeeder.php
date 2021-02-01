<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
        $this->call(PromotionsSeeder::class);
        $this->call(ElevesSeeder::class);
        $this->call(GroupeMatieresSeeder::class);
        $this->call(ProfSeeder::class);
        $this->call(MatieresSeeder::class);
        $this->call(BulletinsSeeder::class);
        $this->call(PeriodesSeeder::class);
        $this->call(NotesSeeder::class);
    }
}
