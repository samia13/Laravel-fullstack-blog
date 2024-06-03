<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $posts = Post::where('featured', false)
                    ->with('user', 'categories')
                    ->get();
        $categories = Category::all();
        $featured = Post::featured()->take(3)->get();
        // dd($featured);
        return view('front.index', [
            'posts' => $posts,
            'featured' => $featured,
            'categories' => $categories
        ]);
    }

    public function posts(){
        return view('posts.index');
    }
    
    public function showPost(Post $post){
        $post = $post->load('user','categories');
        $categories = Category::all();
        return view('front.posts.show', compact('post', 'categories'));
    }

    public function showCategory(Category $category){
        $posts = $category->posts()->get();
        $categories = Category::all();
        return view('front.categories.show', compact('category', 'posts', 'categories'));
    }
}
