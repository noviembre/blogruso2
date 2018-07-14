<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Tag;
use App\Category;

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

        $categories = Category::pluck('title', 'id')->all();

        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.posts.create',
            compact('categories','tags'
            ));

    }

    public function store(Request $request)
    {

        $this->validate($request, [

            'title' =>'required',
            'contenido'   =>  'required',
            'image' =>  'nullable|image'

        ]);

        $post = Post::add($request->all());

        $post->uploadImage($request->file('image'));
        $post->setCategory($request->get('category_id'));
        $post->setTags($request->get('tags'));
        $post->toggleStatus($request->get('status'));
        $post->toggleFeatured($request->get('is_featured'));

        return redirect()->route('posts.index');
    }





}
