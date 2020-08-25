<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Subcategory;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class,5)->create()->each(function ($category) {
            $subcategories = factory(Subcategory::class,2)->make();
            $category->subcategories()->saveMany($subcategories);
        });
    }
}
