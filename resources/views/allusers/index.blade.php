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
            <a href="">add post</a>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"width="5%">@No</th>
                        <th scope="col"width="10%">User Name</th>
                        <th scope="col"width="20%">User Email</th>
                        <th scope="col"width="10%">Sign Up Date</th>
                        {{-- <th scope="col"width="7%">status</th> --}}
                        <th scope="col"width="7%">User Type</th>
                        <th scope="col"width="25%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($user as $alluser)
                     <tr>
                        <td>{{$loop->index}}</td>
                        <td>{{$alluser->name}}</td>
                        <td>{{$alluser->email}}</td>
                        <td>{{$alluser->created_at->format('d-M-Y')}}</td>
                        <td>
                            @if($alluser->user_type=="admin")
                            {{"Admin"}}
                            @elseif($alluser->user_type=="modalator")
                            {{"Modalator"}}
                            @elseif($alluser->user_type=="user")
                            {{"User"}}
                            @endif
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