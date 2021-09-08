<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->simplePaginate(5);

        return view('frontend.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();

        return view('backend.post.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;

        if($request->hasFile('image')){
            $post->image = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads',$post->image);
        }
        else{
            $post->image ='';
        }
        DB::beginTransaction();

        try {
            $post->save();
            $post->tags()->attach($request->tag_id);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }

        return redirect()->route('/');
    }

    public function show($id)
    {
        $posts = Post::findorFail($id);

        return view('frontend.show', compact('posts'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function AuthorWisePost($id)
    {

    }
}
