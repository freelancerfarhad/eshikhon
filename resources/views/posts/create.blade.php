@extends('layouts.app')
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@show
@section('content')
    

    <div class="container">
        <div class="row my-5">
            <div class="col-md-12">
                <h1>Post Added</h1>
                <form action="{{route('posts.store')}}" method="post"enctype="multipart/form-data">
                    @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Categori title</label>
                             <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"id="title" placeholder="Posts title"value="{{old('title')}}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Categori </label>
                        <select name="category_id"type="text" id="category_id"class="form-select @error('category_id') is-invalid @enderror"placeholder="catagory">
                            <option value="">Category Selected</option>
                       @foreach ($category as $category)
                       <option value="{{$category->id}}">{{$category->name}}</option>
                       @endforeach

                        </select>

                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>

                      <div class="mb-3">
                            <label for="body" class="form-label">Example textarea</label>
                            <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body"rows="10"placeholder="Your body"value="{{old('body')}}"></textarea>
                            @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                      </div>

                       <div class="mb-3">
                            <label for="tag_id" class="form-label">Categori thumbnail</label>
                            <select id="tag_id"type="text"
                            class="form-control  @error('tag_id') is-invalid @enderror"
                             name="tag_id[]" placeholder="selected" multiple>

                                <option></option>
                                  @foreach ($tags as $tag)
                                  <option value="{{$tag->id}}">{{$tag->name}}</option>
                                  @endforeach
                               
                              </select>
                              
                                @error('tag_id')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                    </div>
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Categori thumbnail</label>
                         <input type="file" 
                         class="form-control @error('thumbnail') is-invalid @enderror"
                          name="thumbnail"id="thumbnail">
                            @error('thumbnail')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>
                   


                      <div class="mb-3">
                          <button type="submit"class="btn btn-sm btn-success">Create</button>
                        </div>
                </form>
            </div>
        </div>
    </div>@endsection
@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '#body' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
<script>
  $(function() {
$('#tag_id').select2({
    placeholder:"Selected Tags",
});
});
</script>
@endsection

