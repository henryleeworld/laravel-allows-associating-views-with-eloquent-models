<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $posts = Post::latest()->get();
        
        return view('list', compact('posts'));
    }
}
