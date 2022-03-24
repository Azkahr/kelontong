<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        /* User::create([
            'name' => 'Azka',
            'email' => 'azkahar@gmail.com',
            'role' => 'seller',
            'nama_toko' => 'Azka Shop',
            'email_verified_at' => now(),
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Naufal',
            'email' => 'kurabersayap002@gmail.com',
            'role' => 'user',
            'email_verified_at' => now(),
            'password' => bcrypt('12345')
        ]); */

        Category::create([
            'name' => 'Makanan',
            'slug' => 'makanan'
        ]);
        
        Category::create([
            'name' => 'Minuman',
            'slug' => 'minuman'
        ]);

        Category::create([
            'name' => 'Jajanan',
            'slug' => 'jajanan'
        ]);

        Category::create([
            'name' => 'Obat',
            'slug' => 'obat',
        ]);

        Category::create([
            'name' => 'Sembako',
            'slug' => 'sembako',
        ]);

        Category::create([
            'name' => 'Alat tulis',
            'slug' => 'alat-tulis',
        ]);

        Category::create([
            'name' => 'Produk Digital',
            'slug' => 'produk-digital',
        ]);

        Category::create([
            'name' => 'Perlengkapan Mandi',
            'slug' => 'perlengkapan-mandi',
        ]);

        Category::create([
            'name' => 'Perlengkapan Mencuci',
            'slug' => 'perlengkapan-mencuci',
        ]);

        Category::create([
            'name' => 'Perlengkapan Rumah Tangga',
            'slug' => 'perlengkapan-rumah-tangga',
        ]);

        Category::create([
            'name' => 'Perlengkapan Bayi',
            'slug' => 'perlengkapan-bayi',
        ]);

        Category::create([
            'name' => 'Bahan - Bahan Dapur',
            'slug' => 'bahan-bahan-dapur',
        ]);

        // Product::factory(50)->create();
    }
}
