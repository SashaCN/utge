<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Price;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\CategoryProduct;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategorySubCategory;
use App\Models\ProductSubCategory;
// use Database\Factories\CategoryProductFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(10)->create();
        SubCategory::factory()->count(10)->create();
        Product::factory()->count(10)->has(Price::factory()->count(1))->has(Image::factory()->count(1))->create();
        CategoryProduct::factory()->count(10)->create();
        CategorySubCategory::factory()->count(10)->create();
        ProductSubCategory::factory()->count(10)->create();
    }
}
