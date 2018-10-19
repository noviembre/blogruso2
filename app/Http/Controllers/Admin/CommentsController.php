<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CommentsController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->pluck('id')->toArray();
        $allComments = Comment::whereIn('post_id', $posts)->get();

        #---------------- Count today Comments -----------------
        $todayComments = $allComments->where('created_at', '>=', \Carbon\Carbon::today())->count();
        return view('admin.comments.index', compact(
            'allComments',
            'todayComments'
        ));
    }


    public function toggle($id)
    {
        $comment = Comment::find($id);
        $comment->toggleStatus();
        return redirect()->back();
    }

    public function destroy($id)
    {
        Comment::find($id)->remove();
        return redirect()->back();
    }
}
