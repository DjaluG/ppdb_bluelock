<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \App\Models\User::create([
            'name' => 'Max',
            'email' => 'max@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'admin',
        ]);
    }
}
