@extends('frontend.layouts.master')

@section('title','Sports Blog')

@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0&appId=559834888775432&autoLogAppEvents=1" nonce="i3l6IJwk"></script>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url({{asset('frontend/assets/img/home-bg.jpg')}})">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{$posts->title}}</h1>
                        <span class="meta">
                            Posted by
                            <a href="{{route('author_wise_post',$posts->user_id)}}">{{ $posts->user->name }}</a> <br>
                            {{dateFormate($posts->created_at)}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    @if(!empty($posts->image)){
                        <img src="/uploads/{{$posts->image}}" width="500" height="600">
                    }
                    @endif
                    <p>{{strip_tags($posts->body)}}</p>
                    <span>Tags:
                        @foreach ($posts->tags as $tag )
                            <a href="as" class="btn btn-secondary" role="button">{{$tag->name }}</a>
                        @endforeach
                    </span><div class="fb-comments" href="https://blog.lo" data-width="" data-numposts="10"></div>
                </div>
            </div>

        </div>
    </article>
@endsection

