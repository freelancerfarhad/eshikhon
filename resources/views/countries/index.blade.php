@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @include('message.success_message')
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Country
                    </button>
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col"width="5%">@No</th>
                            <th scope="col"width="10%">Name</th>
                            <th scope="col"width="20%">Capital</th>
                            <th scope="col"width="10%">population</th>
                            <th scope="col"width="10%">Action</th>
                            {{-- <th scope="col"width="7%">status</th> --}}
                           
                          </tr>
                        </thead>
                        <tbody>
                    
                         <tr>
                           <td>dd</td>
                           <td>dd</td>
                           <td>dd</td>
                           <td>dd</td>
                            
                            <td>
                                <a href=""class="btn btn-sm btn-info">edit</a> |
                                <a href=""class="btn btn-sm btn-danger">delete</a> 
                            </td>
                          </tr>
                         
                         
                      
                        </tbody>
                      </table>

                        </div>
    
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="alertmess">

                                        </div>
                                    <form action="" id="country_form">
                                        {{-- @csrf --}}
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> Name</label>
                                            <input type="text" class="form-control" name="name"id="name" value="">
                                           
                                        </div>
                                        <div class="mb-3">
                                            <label for="capital" class="form-label"> Capitals</label>
                                            <input type="text" class="form-control" name="capital"id="capital" value="">
                                           
                                        </div>
                                        <div class="mb-3">
                                            <label for="population" class="form-label">  population</label>
                                            <input type="text" class="form-control" name="population"id="capital"value="">
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        
                                                <button type="submit"class="btn btn-sm btn-success">Create</button>
                                              
                                            </div>
                                    </form>

                                    </div>
                                    
                                </div>
                                </div>
                        </div>
                       
                </div>
            </div>
        </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(function(){
            $('#country_form').submit(function(e){
                e.preventDefault();

           var form_data = $('#country_form').serialize();
               $.ajax({
                    url:'/countries',
                    method:'POST',
                    data:form_data,
                    headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                    success:function(res){
                        if(!res.status){
                            $('#alertmess').html(res.message);
                        }
                    },
                    error:function(res){
                        console.log(res);
                    }
                  });
            });
        });
    </script>
@endsection
