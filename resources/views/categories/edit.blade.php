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
                <h1>Categories Edit</h1>
                <form action="{{route('categories.update',$category->id)}}" method="post">
                    @csrf
                   @method('patch')
                    <div class="mb-3">
                        <label for="Name" class="form-label">Categori Name</label>
                        <input type="text" class="form-control" name="name"id="Name" value="{{$category->name}}">
                      </div>
                      <div class="mb-3">
                        <label for="Description" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="Description" name="description"rows="3"value="">
{{$category->description}}
                        </textarea>
                      </div>
                      <div class="mb-3">
                          <button type="submit"class="btn btn-sm btn-success">Update</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>