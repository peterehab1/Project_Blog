@extends('layouts.layout')
@section('content')
        <!-- main -->
        <div class="page-container scene-main scene-main--fade_In">
            

            @if(Auth::check())
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{url('/post/create')}}"><button style="margin-bottom: 50px;" type="button" class="btn btn-primary btn-block">Add New Blog</button></a>
                    </div>
                </div>
            </div>
            @endif

            <!-- Blog -->
            <div class="container">
                <div class="row blog_posts stander_blog one_colo_stander_blog">


                    @foreach($posts as $p)
                    <?php
                    $id = $p->user->id;
                    ?>
                    <div class="col-md-6 col-lg-4">
                        <article>
                            <div class="post_img">
                                <img src="images/uploads/{{$p->picture}}" alt="Card image cap">
                            </div>
                            <h5 class="post_title">
                                <a href="{{route('post.show', $p->id)}}">{{ $p->title }}</a>
                                
                            </h5>
                            <div class="post_meta_top">
                                <span class="post_meta_category">
                                    <a href="category/{{ $p->category->id }}">{{ $p->category->name }}</a>
                                </span>
                                <span class="post_meta_category">
                                    <a href="user/{{$id}}">{{ $p->user->name }}</a>
                                </span>
                                <span class="post_meta_date">{{ $p->created_at }}</span>
                            </div>
                            <div class="post_content">
                                <p>{{ substr($p->body, 0, 90) }} <a href="{{route('post.show', $p->id)}}"> [Read More]</a></p>
                            </div>
                        </article>
                    </div>
                    @endforeach

 
                </div>
                <div class="text-center">{{$posts->links()}}</div>
            </div>
            <!-- Subscribe To The Newsletter  -->
            <div class="bg-color-creamy pt-80px pb-55px">
                <div class="container">
                    <div class="row small-gutters align-items-center mb-20px">
                        <div class="col-lg-5">
                            <h4 class="mb-15px">Get In Touch</h4>
                            <p>Lorem ipsum quis bibendum auct or de suis erestopius proin qual de suis erestopius liqueenean
                                sollicituin. Oratio pertinax, id his aliquam habemus tractatos. </p>
                        </div>
                        <div class="col-lg-6 offset-lg-1">
                            <div class="form-group form-row  mb-0">
                                <div class="col-sm-8 col-xs-12  mb-30px">
                                    <input type="email" name="email" class="form-control form-solid-border form-solid-border validate-required validate-email"
                                        placeholder="Your email">
                                </div>
                                <div class="col-sm-4 col-xs-12  mb-30px">
                                    <button type="submit" class="btn btn-outline-dark rounded-0">Subscribe</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            
        </div>
        <!-- End main -->
   @endsection