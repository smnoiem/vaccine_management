<?php

namespace Database\Seeders;

use App\Models\Center;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            VaccineSeeder::class,
            CenterSeeder::class,
            UserSeeder::class,
        ]);
    }
}
