<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Record System</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/
  bootstrap.min.css">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

  <div class="table-data">
    <div class="list-title">
      <h2>Student lists</h2>
    </div>
    <table border="1">
      <tr>
        <th>S.N</th>
        <th>Name</th>
        <th>Email</th>
        <th>Major</th>
        <th>DOB</th>
        <th>Address</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      @foreach ($lists as $list)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $list->name }}</td>
        <td>{{ $list->email }}</td>
        <td>{{ $list->major_name }}</td>
        <td>{{ $list->dob }}</td>
        <td>{{ $list->address }}</td>
      </tr>
      @endforeach
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>