<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Licor;
use App\Models\Categoria;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategoriaSeeder::class,
        ]);

        $this->call([
            RoleSeeder::class,
        ]);

        $this->call([
            UserSeeder::class,
        ]);

        Licor::factory()->count(50)->create();


    }
}
