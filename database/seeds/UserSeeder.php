<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Courbez',
            'surname' => 'Julian',
            'email' => 'julian.courbez@gmail.com',
            'password' => Hash::make('suFRqR8e2E#3'),
            'email_verified_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Administrateur',
            'surname' => 'WEB',
            'email' => 'admin@bulletinfini.com',
            'password' => Hash::make('?eLkx2J%mA8L*KX'),
            'email_verified_at' => now(),
        ]);
    

    }
}
