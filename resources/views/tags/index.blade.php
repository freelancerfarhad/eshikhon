
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
      <title>Blog & foroum</title>
      <style>
        .del a {margin: 0px -46px;float: left;}
      </style>
       </head>
       <body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1>Tags Table</h1>
            @include('message.success_message')
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">@No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($tags as $tags)
                     <tr>
                        <td>{{$loop->index}}</td>
                        <td>{{$tags->name}}</td>
                        <td>{{$tags->description}}</td>
                        <td>
                          <div class="del">
                            <a href="{{route('tags.edit',$tags->id)}}"class="btn btn-sm btn-info">edit</a> 
                       
                            <form action="{{route('tags.destroy',$tags->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"class="btn btn-sm btn-danger"onclick="return confirm('Are You Sure to Delete !')">delete</button>
                            </form>
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