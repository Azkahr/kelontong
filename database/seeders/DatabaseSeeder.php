<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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

        User::create([
            'name' => 'Azka',
            'email' => 'azkahar@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Naufal',
            'email' => 'kurabersayap002@gmail.com',
            'password' => bcrypt('12345')
        ]);

        Category::create([
            'name' => 'Makanan',
            'slug' => 'makanan'
        ]);
        
        Category::create([
            'name' => 'Minuman',
            'slug' => 'minuman'
        ]);

    }
}
