<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
class PostController extends Controller
{
    public function index(){
      $post = Post::paginate(15);
      return view('post.index',compact('post'));
        }

    public function addPost(Request $request){
      $rules = array(
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
      );
    $validator = Validator::make ( Input::all(), $rules);
    if ($validator->fails())
    return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

    else {
      $post = new Post;
      $post->name = $request->name;
      $post->email = $request->email;
      $post->message = $request->message;
      $post->save();
      return response()->json($post);
        }
    }
}