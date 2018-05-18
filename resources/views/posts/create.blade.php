@extends('layouts.layout')
@section('title')
Create New Post
@endsection()
@section('content')

    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                
                <form enctype="multipart/form-data" method="POST" action="{{route('post.store')}}">
                    {{ csrf_field() }}
                  <div class="form-group">
                    <label for="email">Title:</label>
                    <input required type="text" class="form-control" name="title">
                  </div>
                  <div class="form-group">
                      <label for="comment">Body:</label>
                      <textarea required class="form-control" rows="5" name="body" id="comment"></textarea>
                  </div>


                  <div class="form-group">
                      <label for="comment">Category:</label>
                      <select required name="category" class="form-control">
                        <option value="1">Travel</option>
                        <option value="2">Photography</option>
                        <option value="3">Food</option>
                      </select>

                  </div>


                  <div class="form-group">
                      <span style="color: red">*Optional</span><br>
                      <label for="comment">Post main picture:</label>
                      <input type="file" name="picture" class="form-control">
                  </div>

                  <input value="{{Auth::user()->id}}" type="text" hidden name="user">

                  
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>

@endsection