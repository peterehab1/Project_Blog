@extends('layouts.layout')
@section('content')
<?php
  $user = $post->user->id;
?>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                 @if(Session::has('success'))
                  <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                  </div>
                  @endif

                   <h1>{{$post->title}}</h1>
                   <span>Category : </span>
                   <strong><a href="{{ url('category/'.$post->category->id.'') }}">{{ $post->category->name }}</a></strong><br>
                   
                   
                   <span>By : </span><strong><a href="{{ url('user/'.$user.'') }}">{{ $post->user->name }}</a></strong><br><span> In : </span><strong>{{ $post->created_at }}</strong>

                   <br><br><br>
                   <img src="../images/uploads/{{ $post->picture }}"><br><br>
                   <p style="color: black">{{$post->body}}</p>

                   <br>
                   <hr>
                   <h2><strong>Comments ({{ $count }})</strong></h2>
                   
                   <br>

                   @foreach($comments as $comment)
                   <strong>{{ $comment->user->name }} : </strong><span>{{ $comment->comment}}
                    @if(Auth::id() == $comment->user->id)
                    <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                              @method('delete')
                              @csrf

                                <input style="background: red;" type="submit" value="Delete Comment" />
                            </form>
                    @endif
                  </span><br><br>
                   @endforeach


                   @if(Auth::check())
                   <form method="POST" action="{{ route('comment.store') }}">
                     
                      @csrf
                     <input class="comment-input" type="text" name="comment">
                     <input value="{{ Auth::id() }}" hidden class="comment-input" type="number" name="user_id">
                     <input value="{{ $post->id }}" hidden class="comment-input" type="number" name="post_id">

                     <input class="form-control" type="submit" value="Comment" name="submit">
                   </form>
                   @endif

            </div>
        </div>
    </div>

@endsection