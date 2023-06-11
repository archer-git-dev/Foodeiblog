<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index()
    {

        $comments = Comment::where('status', '0')->get();

        return view('admin.comment.index', compact('comments'));
    }

    public function update(Comment $comment)
    {
        $comment->update(['status' => '1']);

        return redirect()->route('admin.comment.index');
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comment.index');
    }
}
