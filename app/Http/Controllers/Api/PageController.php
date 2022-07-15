<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PageController extends Controller
{
    public function index(){
        // $posts = Post::with('category')->with('tags')->paginate(6);

        $posts = Post::paginate(6);

        return response()->json(compact('posts'));
    }

    public function getPostViaSlug($slug){
        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();

        return response()->json(compact('post'));
    }
}
