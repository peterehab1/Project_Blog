@extends('layouts.layout')
@section('content')
   
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                 @if(Session::has('success'))
                  <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                  </div>
                  @endif
                   <h1>{{$post->title}}</h1>
                   {{ $post->category->name }}
                   <span>{{$post->created_at}}</span>

                   <br><br><br>
                   <p style="color: black">{{$post->body}}</p>

            </div>
        </div>
    </div>

@endsection