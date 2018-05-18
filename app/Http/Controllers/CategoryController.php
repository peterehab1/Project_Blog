<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class CategoryController extends Controller
{
    public function index($id){

    	$posts = Post::all()->where('category_id', $id);
    	return view('posts.category', compact('posts', $posts));
    }

    
}
