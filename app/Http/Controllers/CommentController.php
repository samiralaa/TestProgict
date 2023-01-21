<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentStoreRequest;

class CommentController extends Controller
{
    public function create($id)
    {
      
        return view('comments.create',compact('id'));
    }

    public function store(CommentStoreRequest $request ,$id)
    {
       Comment::create([
        'user_id'=>Auth::id(),
        'post_id'=>$id,
        'comment'=>$request->comment,
       ]);
       return redirect()->back()->with('message', 'The Add comment  is succsess');
    }

    public function destroy($id)
    {
        $comment=Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }

    public function hdelelet()
    {
        $comments=Comment::onlyTrashed()->get();
        return view('comments.softdelete',compact('comments'));
    }

    public function restore( $id)
    {
        $comments=Comment::withTrashed()->where('id',$id)->restore();
        return redirect()->back();
    }

    public function forcdelete($id){
        $comments=Comment::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back();
    }

}
