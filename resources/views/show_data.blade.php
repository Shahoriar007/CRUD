<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>CRUD</title>
  </head>
  <body>

    <div class="container">

    <a href="{{url('/add')}}" class="btn btn-primary my-3">Add data</a>

    @if (Session::has('msg'))
        <p class="alert alert-success">{{ Session::get('msg') }}</p>
    @endif

    <table class="table table-dark table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($showData as $key=>$data)
        <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->email }}</td>
        <td>
            <a href="{{ url('/edit-data/'.$data->id) }}" class="btn btn-success">Edit</a>
            <a href="{{ url('/delete-data/'.$data->id) }}" onclick = "return confirm('Sure????')" class="btn btn-danger">Delete</a>
        </td>
        </tr>
    @endforeach
  </tbody>
</table>
{{ $showData->links() }}


    </div>
    
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>