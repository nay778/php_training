<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/
bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
  <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <script src="{{ asset('js/library/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('js/library/jquery-ui.js') }}"></script>
  <script src="{{ asset('js/common.js') }}"></script>
  <style>
    .left {
      left: -31px;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row g-0">
      <nav class="col-2 bg-light pr-3">
        <h1 class="h4 py-3 text-center text-primary">
          <i class="fas fa-university mr-2"></i>
          <span class="d-none d-lg-inline">
            Admin Panel
          </span>
        </h1>
        <div class="list-group text-center text-lg-left">
          <span class="list-group-item disabled d-none d-lg-block">
            <small>CONTROLS</small>
          </span>
          <a href="{{ route('list') }}" class="list-group-item list-group-item-action active">
            <i class="fas fa-home"></i>
            <span class="d-none d-lg-inline">Dashboard</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <i class="fas fa-user-circle"></i>
            <span class="d-none d-lg-inline">Profile</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <i class="fas fa-chart-line"></i>
            <span class="d-none d-lg-inline">Statistics</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <i class="fas fa-users"></i>
            <span class="d-none d-lg-inline">Users</span>
            <span class="d-none d-lg-inline badge bg-danger
                  rounded-pill float-right">20</span>
          </a>
        </div>
        <div class="list-group mt-4 text-center text-lg-left">
          <span class="list-group-item disabled d-none d-lg-block">
            <small>ACTIONS</small>
          </span>
          <a href="{{ route('search-view') }}" class="list-group-item list-group-item-action">
            <i class="fas fa-search text-primary pr-1"></i>
            <span class="d-none d-lg-inline">Serach</span>
          </a>
          <a href="{{ route('mail-view') }}" class="list-group-item list-group-item-action">
            <i class="fas fa-paper-plane text-primary pr-1"></i>
            <span class="d-none d-lg-inline">Send Mail</span>
          </a>
          <button class="list-group-item list-group-item-action create">
          <i class="fas fa-user-plus text-info pr-1"></i>
            <span class="d-none d-lg-inline">New Student</span>
          </button>
          <a href="{{ route('import-view') }}" class="list-group-item list-group-item-action">
            <i class="fas fa-cloud-upload-alt text-primary pr-1"></i>
            <span class="d-none d-lg-inline">Upload Excel File</span>
          </a>
          <a href="{{ route('export') }}" class="list-group-item list-group-item-action">
            <i class="fas fa-cloud-download-alt text-info pr-1"></i>
            <span class="d-none d-lg-inline">Download Excel File</span>
          </a>
        </div>
      </nav>
      <main class="col-10 alert-info">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="flex-fill"></div>
          <div class="navbar nav">
            <div class="dropdown">
              <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle"></i>
                Admin01
              </a>
              <ul class="dropdown-menu text-center left" aria-labelledby="dropdownMenuLink">
                <li>
                  <a href="#" class="dropdown-item">Profile</a>
                </li>
                <li>
                  <a href="#" class="dropdown-item">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="container-fluid mt-3 p-4">
          @yield('content')
        </div>
      </main>
    </div>
  </div>
  <script src="{{ asset('js/api_common.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

