<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('front.pages.index');
    }

    public function posts(){
        return view('posts.index');
    }
    
    public function showPost(){
        return view('posts.show');
    }
}
