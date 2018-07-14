<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag1 = [

            'title' => 'Aventura',
            'slug' => str_slug('aventura'),


        ];

        $tag2 = [

            'title' => 'Tradicional',
            'slug' => str_slug('tradicional'),


        ];

        $tag3 = [

            'title' => 'Cultural',
            'slug' => str_slug('cultural'),


        ];

        $tag4 = [

            'title' => 'Fiestas',
            'slug' => str_slug('fiestas'),


        ];

        Tag::create($tag1);
        Tag::create($tag2);
        Tag::create($tag3);
        Tag::create($tag4);

    }
}
