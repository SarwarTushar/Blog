@extends('frontend.layouts.master')

@section('title','Sports Blog|'.$posts[0]->user->name)

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('{{asset('frontend/assets/img/about-bg.jpg')}}">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-12">
                    <div class="site-heading">
                        <h1>Sports Blog</h1>
                        <span class="subheading">A Blog For Sports Lover</span>
                        <h1>Post By {{$posts[0]->user->name}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                <div class="post-preview">
                    @foreach ($posts as $post)
                        <a href="{{route('post.show',$post->id)}}">
                            <h2 class="post-title">{{$post->title}}</h2>
                            <h3 class="post-subtitle">{{Str::limit(strip_tags($post->body), 150, '...')}}</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="{{route('author_wise_post',$post->user_id)}}">{{ $post->user->name }}</a>
                            {{dateFormate($post->created_at)}}
                        </p>
                    @endforeach
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

