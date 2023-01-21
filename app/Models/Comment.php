<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates=['deteted_at'];
    protected $fillable=[ 'comment', 'user_id', 'post_id','deleted_at', 'created_at', 'updated_at'];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
