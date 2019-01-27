<?php

use App\Category;
use App\Image;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 20)->create()->each(function (Category $category) {
            factory(Image::class)->create([
                'imageable_id' => $category->id,
                'imageable_type' => Category::class,
            ]);
        });
    }
}
