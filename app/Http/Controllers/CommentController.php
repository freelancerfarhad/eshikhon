<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Post;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post,Request $request)
    {
        $request->validate([
            'body' => 'required|min:3|max:100'
        ]);
        $post->comments()->create([
            'body'=>request('body'),
            'user_id'=>auth()->id()
        ]);

        $subsc=$comment->post->likes;

        foreach($subsc as $sub){

            $user=$sub->user;

            \Mail::raw('new comment on a post',function($message)use($user){
                $message->to($user->email,'admin')->subject('new comment added');
            });
        }

        return back()->with('success','comment successfully !');

   
    }
    public function stores(Post $post)
    {
        // $request->validate([
        //     'user_id' => 'required'
        // ]);
        // dd(request()->all());
        $likes=$post->likes()->where('user_id',auth()->id())->first();
        if($likes){
            $post->likes()->delete();
            return back()->with('success','Your disliked this post !');
        }
       $post->likes()->create([
        'user_id'=>auth()->id()
       ]);

       return back()->with('success','like successfully !');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function commentlike(Comment $comment)
    {
        $likes=$comment->likes()->where('user_id',auth()->id())->first();
        if($likes){
            $comment->likes()->delete();
            return back()->with('success','Your disliked this comment !');
        }
       $comment->likes()->create([
        'user_id'=>auth()->id()
       ]);

       return back()->with('success','comment like successfully !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
