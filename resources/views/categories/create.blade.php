<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Blog & foroum</title>
</head>
<body>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-12">
                <h1>Categories Added</h1>
                <form action="{{route('categories.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="Name" class="form-label">Categori Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"id="Name" placeholder="Categories Name"value="{{old('name')}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                      <div class="mb-3">
                        <label for="Description" class="form-label">Example textarea</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="Description" name="description"rows="3"placeholder="Your Description"value="{{old('description')}}">

                        </textarea>
                        @error('description')
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
    </div>
</body>
</html>