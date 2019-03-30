<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Http\Requests\CommentStoreRequest;

class CommentsController extends Controller
{
    public function store(Post $post, CommentStoreRequest $request)
    {
        // 1st
//        $data = $request->all();
//        $data['post_id'] = $post->id;
//
//        Comment::create($data);

        // 2nd
//        $post->comments()->create($request->all());

        // 3rd
        $post->createComment($request->all());


        return redirect()->back()->with('message', "Your comment successfully sent.");
    }
}
