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
<p>
@foreach ($posts as $post)
 <p>  {{$post->id}} //{{$post->title}}</p>
 <a href="{{route('posts.restore',$post->id)}}">restore</a>
 @foreach ($post->comment as $comment)
 <p>{{$comment->id}}</p>
 @endforeach
 <td>  
                <form action="{{route('posts.forcdelete',['id'=>$post->id])}}" method="post">
                   @csrf
                   {{method_field('DElETE')}}
                   <input type="submit" name="delete" class="delete" value="Delete">
                </form>
            </td>
            <hr>
 @endforeach
</p>
  </div>
</div>
</body>
</html>
@endsection