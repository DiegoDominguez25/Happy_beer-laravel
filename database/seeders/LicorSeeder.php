<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Licor;

class LicorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Licor::create([
            'id' => 1,
            'nombre' => 'Vodka',
            'descripcion' => 'alcohol vokda oso negro',
            'precio' => 2400,
            'stock' => 155
        ]);
    }
}
