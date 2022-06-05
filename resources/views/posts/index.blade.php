<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Document</title>
    <style>
        /* .del a {margin: 0px -46px;float: left;} */
    </style>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1>Post Table</h1>
            @include('message.success_message')
            <a href="{{route('posts.create')}}">add post</a>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"width="5%">@No</th>
                        <th scope="col"width="10%">Tile</th>
                        <th scope="col"width="20%">Description</th>
                        <th scope="col"width="10%">thumbnail</th>
                        {{-- <th scope="col"width="7%">status</th> --}}
                        <th scope="col"width="7%">category</th>
                        <th scope="col"width="10%">user</th>
                        <th scope="col"width="10%">Time</th>
                        <th scope="col"width="25%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($posts as $post)
                     <tr>
                        <td>{{$loop->index}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{@$post->body}}</td>
                        <td>{{@$post->thumbnail}}</td>
                        {{-- <td>{{@$post->status}}</td> --}}
                        <td>{{@$post->category_id}}</td>
                        <td>user</td>
                        <td>{{@$post->created_at->diffForHumans()}}</td>
                        
                        <td>
                          <div class="del">
                           
{{--                        
                            <form action="{{route('posts.destroy',$post->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"class="btn btn-sm btn-danger"onclick="return confirm('Are You Sure to Delete !')">delete</button> |
                            </form> --}}
                            <a href="{{route('posts.edit',$post->id)}}"class="btn btn-sm btn-info">edit</a> |
                            <a href="{{route('posts.approve',$post->id)}}"class="btn {{($post->status==1)?'btn-danger':'btn-success'}} btn-sm">{{($post->status==1)?'Unapprove':'Approved'}}</a> |
                            <a href="{{route('posts.edit',$post->id)}}"class="btn btn-sm btn-danger">delete</a> 
                           
                          </div>
                        </td>
                      </tr>
                     @endforeach   
                     
                  
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</body>
</html>