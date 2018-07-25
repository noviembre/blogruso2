<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {

        $posts = Post::paginate(2);
        $popularPost = Post::orderBy('views','desc')->take(3)->get();

        #=============   FEATURED  ==================#
        $featuredPost = Post::where('is_featured', 1)
                        ->take(3)->pluck('id')->all();

        dd($featuredPost);
        return view('pages.index')->with('posts', $posts);
    }


    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('pages.show', compact('post'));
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        //$posts = $tag->posts()->where('status',1)->paginate(2);
        $posts = $tag->posts()->paginate(2);
        return view('pages.list', ['posts'  =>  $posts]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->paginate(2);
        return view('pages.list', ['posts'  =>  $posts]);
    }

}
