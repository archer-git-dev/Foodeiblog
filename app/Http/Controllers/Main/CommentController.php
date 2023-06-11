<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(CommentRequest $request) {

        $data = $request->validated();

        Comment::create($data);

        return redirect()->back();

    }

    public function delete(Comment $comment) {


        $comment->delete();

        return redirect()->back();
    }
}
