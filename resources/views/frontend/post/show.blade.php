@extends('frontend.layouts.master')

@section('title','Sports Blog')

{{-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" /> --}}

@section('content')
<div id="fb-root"></div>
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
    <div class="row g-5">
        <div class="col-md-8">
    <article class="mb-8">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-12">
                    @if(!empty($posts->image))
                        <div class="text-center">
                            <img src="/uploads/{{$posts->image}}" width="500" height="600" >
                        </div>
                    @endif
                    <p>{{strip_tags($posts->body)}}</p>
                    <span>Tags:
                        @foreach ($posts->tags as $tag )
                            <a href="as" class="btn btn-secondary" role="button">{{$tag->name }}</a>
                        @endforeach
                            {{-- Post Comments --}}
                            @if (Auth::check())
                                <div class="card mt-4">
                                    <h5 class="card-header">Comments({{ count($posts->comments) }}) <span class="comment-count float-right badge badge-info"></span></h5>
                                    <div class="card-body">
                                        {{-- Add Comment --}}
                                        <div class="add-comment mb-3">
                                            @csrf
                                            <textarea class="form-control comment" placeholder="Enter Comment"></textarea>
                                            <button data-post="{{$posts->id}}" class="btn btn-dark btn-sm mt-2 save-comment">Submit</button>
                                        </div>
                                        <hr/>
                                        {{-- List Start --}}

                                        <div class="comments">
                                            @if(count($posts->comments)>0)
                                                @foreach($posts->comments as $comment)
                                                    <blockquote class="blockquote">
                                                    <small class="mb-0"><b>{{$comment->user->name }}, {{dateFormate($comment->created_at)}}:</b>{{ $comment->comment }}</small>
                                                    </blockquote>
                                                    <hr/>
                                                @endforeach
                                            @else
                                            <p class="no-comments">No Comments Yet</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @else
                                <p class="no-comments"><b> Please Log In to Comment In This Post. </b></p>
                            @endif
                    {{-- <form action="{{route('post_rating',$posts->id)}}" method="post">
                    @csrf
                        <label for="ratinginput" class="control-label">Give rating for the product:</label>
                        <input id="ratinginput" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="2">
                        <input type="submit" name="Submit"/>
                    </form> --}}
                </div>
            </div>
        </div>
    </article>
</div>

<div class="col-md-4">
  <div class="position-sticky" style="top: 2rem;">
    <div class="p-4 mb-3 bg-light rounded">
      <h4 class="fst-italic">Similar Posts</h4>
        @foreach ($posts->tags as $tag )
            @foreach(collect($tag->posts)->unique('title') as $post)
            <li><a href="{{route('post.show', $post->id)}}">{{$post->title}}</li>
            @endforeach
        @endforeach
    </div>
  </div>
</div>
</div>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
    <script>
        $("#ratinginput").rating();
    </script> --}}

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
    // Save Comment
    $(".save-comment").on('click',function(){
        var _comment=$(".comment").val();
        var _post=$(this).data('post');
        var vm=$(this);
        // Run Ajax
        $.ajax({
            url:"{{ url('save-comment') }}",
            type:"post",
            dataType:'json',
            data:{
                comment:_comment,
                post:_post,
                _token:"{{ csrf_token() }}"
            },
            beforeSend:function(){
                vm.text('Saving...').addClass('disabled');
            },
            success:function(res){
                var _html='<blockquote class="blockquote animate__animated animate__bounce">\
                <small class="mb-0">'+_comment+'</small>\
                </blockquote><hr/>';
                if(res.bool==true){
                    $(".comments").prepend(_html);
                    $(".comment").val('');
                    $(".comment-count").text($('blockquote').length);
                    $(".no-comments").hide();
                }
                vm.text('Save').removeClass('disabled');
            }
        });
    });
    </script>
@endsection

