<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $tags = Tag::all();

        return view('backend.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('backend.tag.create');
    }

    public function store(Request $request)
    {
        Tag::create($request->all());

        return redirect()->route('tag.index');
    }

    public function edit($id)
    {
        $tag = Tag::findorFail($id);

        return view('backend.tag.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {   //dd($request->all());
        Tag::where('id',$id)->update($request->except('_token','_method'));

        return redirect()->route('tag.index');
    }

    public function destroy($id)
    {
        $tag = Tag::findorFail($id);
        $tag->delete();

        return redirect()->route('tag.index');
    }
}
