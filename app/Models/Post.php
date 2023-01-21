<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deteted_at'];
    protected $fillable = [ 'title', 'author', 'content', 'image', 'user_id','created_at','updated_at'];
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
