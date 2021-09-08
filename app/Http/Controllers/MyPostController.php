<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $myPosts = Post::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();

        return view('backend.MyPost.index', compact('myPosts'));
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
        $myPosts = Post::where('id',$id)->first();

        return view('backend.MyPost.show', compact('myPosts'));
    }

    public function edit($id)
    {
        $myPosts=Post::findorFail($id);
        $tags = Tag::all();
        //dd($myPosts->tags);
        return view('backend.MyPost.edit', compact('myPosts','tags'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findorFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;

        if($request->hasFile('image')){
            $post->image = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads',$post->image);
        }
        else{
            $post->image =$request->old_image;
        }
        DB::beginTransaction();

        try {
            $post->save();
            $post->tags()->sync($request->tag_id);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }

        return redirect()->route('/');
    }

    public function destroy($id)
    {
        $myPosts=Post::findorFail($id);
        $myPosts->delete();

        return redirect()->route('mypost.index');
    }

    public function AuthorWisePost($id)
    {

    }
}
