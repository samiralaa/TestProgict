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
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
  <form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Title</label>
  <input type="text" class="form-control" value="{{$post->title}}" name="title" id="exampleFormControlInput1" >
  @error('title')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">author</label>
  <input type="text"  value="{{$post->author}}" class="form-control" name="author" id="exampleFormControlInput1" >
  @error('author')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Content</label>
  <textarea class="form-control"  value="{{$post->content}}" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
  @error('content')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
  <input class="form-control"  value="{{$post->title}}" type="file"  value="{{$post->image}}" name="image" id="formFile">
  @error('image')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
<input type="submit" class="btn btn-primary">
</form>
</body>
</html>
@endsection