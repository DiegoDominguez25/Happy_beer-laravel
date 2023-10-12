<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Licor;
use App\Models\BarcodeLicor;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Licor::factory()->count(50)->create();
        BarcodeLicor::factory()->count(50)->create();

        /*$this->call([
            BarcodeLicorSeeder::class,
        ]);*/
    }
}
