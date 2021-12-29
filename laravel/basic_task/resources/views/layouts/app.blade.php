<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel Basic tasks</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
    .container {
      width: 60%;
      font-size: 10px;
    }

    .navbar {
      padding: 2px;
    }

    .navbar-brand,
    .panel-heading {
      font-size: 12px;
    }

    .navbar-toggler {
      padding: 2px;
      font-size: 10px;
    }

    label {
      font-size: 10px;
    }

    .form-control {
      padding: 0;
      font-size: 10px;
    }

    .panel-body {
      border: 1px solid #d9dde1;
      margin-top: 10px;
    }

    .panel-heading {
      background-color: #f8f9fa;
    }

    .btn {
      border: 1px solid #f8f9fa;
      font-size: 7px;
      margin-top: 10px;
      padding: 4px;
    }

    form {
      padding: 10px;
    }

    td {
      padding: 0;
    }
  </style>
</head>

<body>
  <div class="container mt-2">
    <nav class="navbar navbar-light bg-light">
      <div class="container-md">
        <a class="navbar-brand" href="#">Task List</a>
        <button class="navbar-toggler" type="button" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
  </div>
  <div class="container">
    @yield('content')
  </div>
</body>

</html>