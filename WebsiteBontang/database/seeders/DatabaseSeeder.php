<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Berita;
use App\Models\carousel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin ganteng',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
        ]);
        carousel::factory()->count(5)->create();
        // Berita::factory()->count(150)->create();
    }
}
