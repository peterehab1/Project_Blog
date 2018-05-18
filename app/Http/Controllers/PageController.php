<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;

class PageController extends Controller
{


	public function index(){
		$posts = Post::orderBy('id', 'desc')->paginate(5);
		return view('welcome', compact('posts', $posts));
	}

    public function about(){
    	return view('about');
    }

    public function getUser($id){

    	$user = User::all()->where('id', $id);
        $posts = Post::all()->where('user_id', $id);
    	return view('user', compact('user', $user, 'posts', $posts));
    }


    
    
}
