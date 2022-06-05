@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @include('message.success_message')
                </div>

                <div class="card-body">
              
                        <div class="alert alert-success" role="alert">
                           
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Picture</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Category</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users->posts as $post)
                           
                                  <tr>
                                    <td>{{$loop->index}}</td>
                                    <td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>
                                    <td><img src='{{asset("uploads/$post->thumbnail")}}' alt="picture"width="60"height="40"></td>
                                    <td>
                                        @if($post->status==1)
                                        <p style="color:green">approved</p>
                                        @else
                                        <p style="color:green">panding</p>
                                        @endif
                                    </td>
                                    <td>{{$post->category_id}}</td>
                                  </tr>
                                
                            @endforeach
                                </tbody>
                              </table>
                           
                        </div>
                       
                </div>
            </div>
        </div>

    {{-- $profile) --}}
        <div class="col-md-4">
            <div class="card">
            
                <div class="card-header">
                    <h4>Profile Picture</h4>
                    @if($users->profile_pic)
                        <img src='{{asset("profiles/$users->profile_pic")}}'class="rounded-circle" alt="profiles"width="80px">
                   @else
                    <img src='{{asset("images/avatar.png")}}'class="rounded-circle" alt="profiles"width="80px">
                    @endif
                </div>
                    <div class="card-body">
                       <div class="catd-title"> <p><b>Name : </b> {{$users->name}}</p>
                        <p> Email : <b>{{$users->email}}</b></p>
                        <p> Birth Day : <b>
                            @if($users->date_of_birth)
                            {{$users->date_of_birth->format('Y-m-d')}}</b>
                            @else
                                <i>not date of birth</i>
                            @endif
                        </p>
                        <p> Signup_Date : <b>{{$users->created_at->format('Y-m-d')}}</b></p>
                        {{-- <p> Last_Active : <b>
                            @if($users->last_login)
                            {{$users->last_login->diffForHumans()}}</b>
                            @else
                                <i>not date </i>
                            @endif
                        </p> --}}
                    </div>
                        
                    </div>
                    
                    <a href="{{route('profiles.edit')}}"class="btn btn-sm btn-success">Update Profile</a>
                </div>
            </div>
              {{-- $profile) --}}
        </div>
    </div>
</div>
@endsection
