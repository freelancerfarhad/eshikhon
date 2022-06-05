<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $users=auth()->user();
        return view('profiles.view',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        // $users=User::find(Auth::user()->id());
        // return view('profiles.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function stores(){


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $users=auth()->user();
        return view('profiles.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
      
        $valodator=$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'date_of_birth'=>'required|date',
            'password' => request('password') ? 'required|string|min:6|confirmed':'',
            'profile_pic'=>'mimes:jpg,png'
        ]);
        $user=auth()->user();
        $user->name=$request->input('name');
        $user->date_of_birth=$request->input('date_of_birth');
        $user->password= \Hash::make('password');

        if($request->hasFile('profile_pic')){
         

                $ext= $request->file('profile_pic')->getClientOriginalExtension();
     
                $file_path=$user->id.'.'.$ext;
     
                $request->file('profile_pic')->move('profiles/',$file_path);
     
                $user->profile_pic = $file_path;
        }
        $user->save();
        return redirect('/profile')->with('success','profile updated successfully');
     
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
