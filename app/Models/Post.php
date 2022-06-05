<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Like;
class Post extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function thumbnail_path()
    {
        return asset("/uploads/$this->thumbnail");
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }
    public function likeanddislikes()
    {
        return $this->likes()->where('user_id',auth()->id())->exists();
    }
    
}
