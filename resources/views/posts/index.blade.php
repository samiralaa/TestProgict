@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<div class="card" style="width: 18rem;">
@foreach($posts as $post)
  <img src="{{asset('uplodes/posts/'.$post->image)}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$post->title}}</h5>
    <p class="card-text">{{$post->content}}</p>
    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Update</a>
    <td>  
                <form action="{{route('posts.destroy',['id'=>$post->id])}}" method="post">
                   @csrf
                   {{method_field('DElETE')}}
                   <input type="submit" name="delete" class="delete" value="Delete">
                </form>
            </td>
    <a href="{{route('comment.create',$post->id)}}" class="btn btn-primary">Add comment</a>
    @foreach ($post->comment as $comment)
 <p>{{$comment->comment}}</p>
 <td>  
                <form action="{{route('comment.destroy',['id'=>$comment->id])}}" method="post">
                   @csrf
                   {{method_field('DElETE')}}
                   <input type="submit" name="delete" class="delete" value="Delete Comment">
                </form>
            </td>
 @endforeach
   @endforeach
  </div>

</div>
</body>
</html>
@endsection