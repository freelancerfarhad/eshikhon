<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\User;
use App\Models\Profile;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pageindex()
    {
        // $posts=Post::all();
        $posts=Post::where('status',1)->paginate(5);
        $catagory=Category::all();
        return view('home.index',compact('posts','catagory'));
    }
    public function index()
    {
        
        $users=auth()->user();
        return view('profiles.view',compact('users'));
    }
    
    public function show(Post $post)
    {
        if(auth()->check())
        {
        if(!$post->status && auth()->user()->user_type !='admin')return back();//kono user approve chara kono post a jaite parbe na and admin all pare
    }else{
        if(!$post->status)return back();
    
    }
    return view('home.singleps',compact('post'));
    }

    // public function about()
    // {
    //    return view('home.about');
    // }

    // public function contact()
    // {
    //    return view('home.contact');
    // }
}
