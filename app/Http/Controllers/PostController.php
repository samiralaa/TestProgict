<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;

class PostController extends Controller
{ 
    public function index()
    {
       $posts = Post::with('comment')->get();
       return view('posts.index', compact('posts'));
    }

    public function create()
    {
       return view('posts.create');
    }

    public function store(PostStoreRequest $request)
    {
          $name = uplode_image($request);
          Post::create(['image'=>$name]+$request->validated());
          return redirect()->back()->with('message', 'Content has been insert successfully');
    }

    public function edit(Post $post)
    {  
      return view('posts.edit',compact('post'));
    }

    public function update(PostStoreRequest $request, $id)
    {
          $post = Post::findOrFail($id);
          $path = public_path('uplodes/posts/'.$post->image);
          if ($path !==null) {
           unlink($path);
          }
          $name=uplode_image($request,$request->image);
          $post->update([
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'author'=>$request->author,
            'image'=>$name,
            'content'=>$request->content,
          ]);
          return redirect()->back()->with('message', 'The Update is succsess');
    }

    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect()->back();
    }
    public function hdelelet()
    {
        $posts=Post::onlyTrashed()->get();
        return view('posts.softdelete',compact('posts'));
    }
    public function restore( $id)
    {
        $post=Post::withTrashed()->where('id',$id)->restore();
        return redirect()->back();
    }
    public function forcdelete($id){
        $post=Post::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back();
    }
}
