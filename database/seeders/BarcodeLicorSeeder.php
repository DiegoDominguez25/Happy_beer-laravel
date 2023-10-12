<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BarcodeLicor;

class BarcodeLicorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BarcodeLicor::create([
            'id' => 1,
            'codigo' => 123123123,
            'licor_id' => 1
        ]);
    }
}
