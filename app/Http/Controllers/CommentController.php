<?php

namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CommentController extends Controller
{

    function save_comment(Request $request){

        $data=new Comment();
        $data->post_id = $request->post;
        $data->comment = $request->comment;
        $data->user_id = Auth::user()->id;
        $data->save();
        return response()->json([
            'bool'=>true
        ]);
    }
}
