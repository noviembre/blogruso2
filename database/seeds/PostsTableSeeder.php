<?php

use Illuminate\Database\Seeder;
use App\Post;
//use Carbon\Carbon;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post1 = [

            'title'=>'Alanis Morissette',
            'contenido'=>'Morissette was born June 1, 1974, in Ottawa, Ontario, Canada, to teacher Georgia Mary Ann (née Feuerstein) and high-school principal and French teacher Alan Richard Morissette. She has two siblings: older brother Chad is a business entrepreneur, and twin brother (12 minutes older) Wade is a musicia',
            'category_id'=>2,
            'user_id'=>1,
            'status'=>1,
            'views'=>0,
            'is_featured'=>1,
            'image'=>NULL,
            'created_at'=>'2018-10-18 04:00:00',
            'updated_at'=>'2018-10-18 20:06:48'

        ];

        $post2 = [

            'title'=>'mi segundo posts',
            'contenido'=>'
contenido segundo post contenido segundo post contenido segundo post contenido segundo post contenido segundo post',
            'category_id'=>2,
            'user_id'=>1,
            'status'=>1,
            'views'=>0,
            'is_featured'=>1,
            // do no set a default date, it will response an error

            'image'=>NULL,
            'description'=>'
dessripcion mdessripcion mdessripcion mdessripcion mdessripcion mdessripcion mdessripcion m',

        ];

        $post3 = [

            'title'=>'mi tercer posts',
            'contenido'=>'
contenido tercer posts contenido tercer posts contenido tercer posts contenido tercer posts contenido tercer posts',
            'category_id'=>2,
            'user_id'=>1,
            'status'=>1,
            'views'=>0,
            'is_featured'=>1,
            // do no set a default date, it will response an error
            'image'=>NULL,
            'description'=>'
dessripcion mdessripcion mdessripcion mdessripcion mdessripcion mdessripcion mdessripcion m',
        ];

        Post::create($post1);
        Post::create($post2);
        Post::create($post3);

    }
}
