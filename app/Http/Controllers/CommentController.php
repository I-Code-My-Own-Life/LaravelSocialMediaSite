<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($postId)
    {
        $comments = Comment::where("post_id", $postId)->with('user','user.profile')->get();
        return $comments;
    }
}
