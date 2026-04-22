<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Store::create(['name' => 'Main Store', 'location' => 'Downtown']);
        \App\Models\Store::create(['name' => 'Branch Store', 'location' => 'Suburb']);
    }
}
