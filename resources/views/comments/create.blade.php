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
  <form action="{{route('comment.store',$id)}}" method="post">
   @csrf
    <label for="">Comments</label>
<input type="text" name="comment" >
<input type="hidden" name="user_id" value="">
<input type="text" hidden name="post_id" value="">
<br><br>
<input type="submit" value="go">
</form>
</body>
</html>
@endsection