<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Yoel Baez',
            'email' => 'jbaezgis@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Carlos Jimenez',
            'email' => 'cjimenez@geomatrixgts.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Jean Carlos Mena',
            'email' => 'jmena@geomatrixgts.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
