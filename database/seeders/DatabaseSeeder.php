<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Price;
use App\Models\Product;
use App\Models\SubCategory;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Category::factory()->count(10)->create();
        Product::factory()->count(10)->has(Price::factory()->count(1))->has(Image::factory()->count(1))->create();
        Category::factory()->count(10)->create();
        SubCategory::factory()->count(10)->create();
        // Image::factory()->count(10)->create();
        // Price::factory()->count(10)->create();
        // \App\Models\User::factory(10)->create(); 

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
