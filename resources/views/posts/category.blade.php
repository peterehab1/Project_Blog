@extends('layouts.layout')
@section('title')
Create New Post
@endsection()
@section('content')
    
    <div class="container">
        <div class="row">
            @foreach($posts as $p)
                  <div class="col-md-6 col-lg-4">
                        <article>
                            <div class="post_img">
                                <img src="images/32.jpg" alt="Card image cap">
                            </div>
                            <h5 class="post_title">
                                <a href="blog-single-post.html">{{ $p->title }}</a>
                            </h5>
                            <div class="post_meta_top">
                                <span class="post_meta_category">
                                    <a href="blog-single-post.html">{{$p->category->name}}</a>
                                </span>
                                <span class="post_meta_date">{{$p->created_at}}</span>
                            </div>
                            <div class="post_content">
                                <p>{{ substr($p->body, 0, 150) }}<a href="{{route('post.show', $p->id)}}"> [Read More]</a></p>
                            </div>
                        </article>
                    </div>
                    @endforeach

        </div>
       
    </div>



@endsection