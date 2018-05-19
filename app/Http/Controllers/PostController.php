<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use Session;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('posts.index', compact('posts', $posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            return view('posts.create');
        }else{
            return view('auth.login');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        
        $this->validate($request, array(
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'user' => 'required',
            'picture' => 'mimes:jpeg,png,jpg|max:2048'

        ));

        if($request->file('picture')){

            $image = $request->file('picture');
            $input['picture'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/uploads');
            $image->move($destinationPath, $input['picture']);
            $post->picture = $input['picture'];
        }
        


        
        $post->title = $request->title;
        $post->body = $request->body;

        

        $post->category_id = $request->category;
        $post->user_id = $request->user;

        $post->save();

        Session::flash('success', 'Your Post created successfully!');
        return redirect()->route('post.show', $post->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post = Post::find($id);
        $comments = Comment::all()->where('post_id', $id);
        $count = Comment::all()->where('post_id', $id)->count();
    return view('posts.show', compact('post', $post, 'comments', $comments, 'count', $count));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $user_id = Auth::id();
        if ($post->user_id == $user_id) {

            $post->delete();
            return view('posts.edit');
        }

        

    }
}
