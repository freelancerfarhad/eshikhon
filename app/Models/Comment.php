<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;
class Comment extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected static function boot(){
        parent::boot();
        self::created(function($comment){
                $subsc=$comment->post->likes;

        foreach($subsc as $sub){

            $user=$sub->user;

            \Mail::raw('new comment on a post',function($message)use($user){
                $message->to($user->email,'admin')->subject('new comment added');
            });
        }
        });
    }

    public function owners()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
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
