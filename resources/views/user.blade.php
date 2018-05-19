@extends('layouts.layout')
@section('content')
   
    
              <div class="container">
                    <div class="row">

                  @foreach($user as $u)
                  <?php
                  $dt = new DateTime($u->created_at);
                  $date = $dt->format('m/d/Y');
                  ?>
                  
                      <div class="col-lg-12">
                        <div class="backBone">
                          <img style="width: 50px;border-radius: 100px;" src="{{ asset('images/avatar.jpg') }}"><br>

                          <span>{{$u->name}}</span><br>
                          <p>{{$u->email}}</p><br>
                          <span>Member Since <br><strong>{{ $date }}</strong></span>

                          <br><br>
                          <a class="change-pic" href="##">Change Profile Picture</a>
                        </div>
                         

                      </div>
                      @foreach($posts as $post)
                      <div class="col-lg-4">
                        
                            
                            
                            <div class="backBone">
                            <span>{{$post->title}}</span><br>
                            <p>{{ substr($post->body, 0, 50) }} <a href="{{route('post.show', $post->id)}}"> [Read More]</a></p>
                            
                            @if(Auth::id() == $post->user_id)
                            <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                              @method('delete')
                              @csrf

                                <button type="submit" class="btn btn-danger"/>Delete</button>
                            </form>
                            @endif
                            </div>
                            
                            
                            

                            
                          


                  </div>
                  @endforeach

                  @endforeach
              </div>
                 </div>    


@endsection