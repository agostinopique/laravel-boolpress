<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

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

    public function getTagsAndCategories(){

        $categories = Category::all();

        $tags = Tag::all();

        return response()->json(compact('categories', 'tags'));
        // return response()->json(compact('categories'));
    }

    public function getPostByTag($slug_tag){
        $tagPosts = Tag::where('slug', $slug_tag)->with('posts')->get();

        return response()->json($tagPosts);
    }

    public function getPostByCategory($slug_category){
        $catPost = Category::where('slug', $slug_category)->with('posts')->first();

        return response()->json($catPost);
    }
}
