<?php

namespace Database\Seeders;

use App\Models\Kategori;
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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);

        Kategori::create([
            'nama_kategori' => 'Internasional'
        ]);
        Kategori::create([
            'nama_kategori' => 'Olahraga'
        ]);
        Kategori::create([
            'nama_kategori' => 'Kesehatan'
        ]);
        Kategori::create([
            'nama_kategori' => 'Otomotif'
        ]);
    }
}
