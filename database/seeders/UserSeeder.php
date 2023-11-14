<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Diego Dominguez',
            'email' => 'diego.dominguez@gmail.com',
            'password' => bcrypt('12345')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Tristan',
            'email' => 'ejemplo@gmail.com',
            'password' => bcrypt('123456')
        ])->assignRole('User');
    }
}
