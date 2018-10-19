<?php

use Illuminate\Database\Seeder;
use App\Comment;
class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create( [
            'text'=>'mi comment mi comment mi coment',
            'user_id'=>2,
            'post_id'=>1,
            'status'=>1,
            'created_at'=>'2018-10-17 04:00:00',
            'updated_at'=>'2018-10-17 04:00:00'
        ] );

        Comment::create( [
            'text'=>'mi comment mi comment mi coment',
            'user_id'=>2,
            'post_id'=>1,
            'status'=>1,
            'created_at'=>'2018-10-18 04:00:00',
            'updated_at'=>'2018-10-18 04:00:00'
        ] );



        Comment::create( [
            'text'=>'mi comment mi comment mi coment',
            'user_id'=>1,
            'post_id'=>3,
            'status'=>1,
        ] );



        Comment::create( [
            'text'=>'mi comment mi comment mi coment',
            'user_id'=>1,
            'post_id'=>3,
            'status'=>1,
        ] );



        Comment::create( [
            'text'=>'mi comment mi comment mi coment',
            'user_id'=>1,
            'post_id'=>3,
            'status'=>1,
        ] );


    }
}
