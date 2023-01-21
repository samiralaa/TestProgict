<?php
use Illuminate\Http\Request;
if (! function_exists('uplode_image')) {
     function uplode_image($request)
    {
  
       $name="post-".uniqid().'.'.$request->image->getClientOriginalExtension();
      
       $request->image->move(public_path('uplodes/posts'),$name);
       return $name;
      
    }
}