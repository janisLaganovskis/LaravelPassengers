<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function postCreatePost(Request $request){
        
       $this->validate($request, [
           'body' => 'required|max:1000'          
       ]);
       
        $post = new Post();
        $post->body = $request['body'];
        
        $message = "There was an error";
        
        if( $request->user()->posts()->save($post)){
            $message = "Post successfully created";
        }
        return redirect()->route('dashboard')->with(['message' => $message]);
    }
    
    public function getDashboard(){
        $this->middleware('auth');
        
        $posts = Post::orderBy('created_at', 'desc')->get();
        
        return view('dashboard', ['posts'=> $posts]);
    }
    
     public function getDeletePost($post_id){
         $post = Post::where('id', $post_id)->first();
         if (Auth::user() != $post->user){
             return redirect()->back();
         }
         
         $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Succesfully deleted']);        
    }
    
      public function postEditPost(Request $request){
          $this->validate($request, [
              'body' => 'required'
              
          ]);          
          $post = Post::find($request['postId']);
          
            if (Auth::user() != $post->user){
             return redirect()->back();
         }
         $post->body = $request['body'];
         $post->update();
          
        return response()->json(['new_body' => $post->body], 200);        
    }
    
      public function postSignup(Request $request)
    {
        $post_id = $request['postId'];
        
        $post = Post::find($post_id);
        if (!$post) { return null;}
        $user = Auth::user();
        $signup = $user->signups()->where('post_id', $post_id)->first();
        if ($signup) { 
            $signup->delete();
            return null;         
        } 
        else {
            $signup = new Signup();
        }
        $signup->user_id = $user->id;
        $signup->post_id = $post->id;
       
        $signup->save();        
        return null;
    }
}
