<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat1 = [

            'title' => 'Cusco',
            'slug' => str_slug('cusco'),

            ];

        $cat2 = [

            'title' => 'Arequipa',
            'slug' => str_slug('arequipa'),

        ];

        $cat3 = [

            'title' => 'Puno',
            'slug' => str_slug('puno'),

        ];

        Category::create($cat1);
        Category::create($cat2);
        Category::create($cat3);


    }
}
