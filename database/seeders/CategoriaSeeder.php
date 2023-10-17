<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'id' => 1,
            'nombre' => 'Tequila',
            'grado' => '44.02',
        ]);

        Categoria::create([
            'id' => 2,
            'nombre' => 'Cerveza',
            'grado' => '15.02',
        ]);

        Categoria::create([
            'id' => 3,
            'nombre' => 'Ron',
            'grado' => '55.02',
        ]);
    }
}
