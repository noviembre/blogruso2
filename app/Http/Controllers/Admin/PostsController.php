<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', ['posts'=>$posts]);
    }

    public function create()
    {


        $tags = Tag::pluck('title', 'id')->all();
        dd($tags);
        return view('admin.posts.create');
    }




}
