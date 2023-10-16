<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommunityComment extends Controller
{
    public function show(Request $request, Post $post) {
        return view('community_comments', ['post' => $post]);
    }
}
