<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use File;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        $tags=Tag::all();
        return view('posts.create',compact('category','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required|min:10',
            'category_id'=>'required|exists:categories,id',
            'thumbnail'=>'required',
            'tag_id'=>'exists:tags,id',
            'thumbnail'=>'required|mimes:jpg,jpeg ,png'
        ]);
       
        $tag_ids=$request->tag_id;
        $tags=Tag::find($tag_ids);

        $post=Post::create($request->except('_token','tag_id'));
        if($request->hasFile('thumbnail')){

           $ext= $request->file('thumbnail')->getClientOriginalExtension();

           $file_path=$post->title.'.'.$ext;

           $request->file('thumbnail')->move('uploads/',$file_path);

           $post->update([
               'thumbnail'=>$file_path
           ]);

        }
       
        $post->tags()->attach($tags);

        return redirect()->to('/posts')->with('success','Posts Added Successfully !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $category=Category::all();
        $tags=Tag::all();
        
        return view('posts.edit',compact('category','post','tags'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required|min:10',
            'category_id'=>'required|exists:categories,id',
            'thumbnail'=>'required|mimes:jpg,jpeg ,png'
        ]);
     
         
           $tag_ids=$request->tag_id;
        $tags=Tag::find($tag_ids);

        $post->update($validated);
       
        if($request->hasFile('thumbnail')){
            if(File::exists("uploads/$post->thumbnail")){
                File::delete("uploads/$post->thumbnail");
            }

            $ext= $request->file('thumbnail')->getClientOriginalExtension();
 
            $file_path=$post->title.'.'.$ext;
 
            $request->file('thumbnail')->move('uploads/',$file_path);
 
            $post->update([
                'thumbnail'=>$file_path
            ]);
 
         }

        $post->tags()->sync($tags);

        return redirect()->to('/posts')->with('success','Posts Updated Successfully !');

    }

    public function approves(Post $post)
    {
      $post->update([
          'status'=> ($post->status==1)?0:1
      ]);
      return back()->with('success','The Post Approved Successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
