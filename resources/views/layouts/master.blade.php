<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">

  <nav class="navbar navbar-light" style="background-color: white;">
    <div class="container container-fluid">
      <a class="navbar-brand" href="{{route('posts.index')}}">Posts</a>

      <div class="dropdown">
        <button class="btn btn-light dropdown-toggle border" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->name }}
        </button>
        <ul class="dropdown-menu">
          <li>
            <form action="{{route('profile.edit')}}">
              @csrf
              <button class="dropdown-item" type="submit">Profile</button>
            </form>
          </li>
          <li>
            <form action="{{route('logout')}}" method="POST">
              @csrf
              <button class="dropdown-item" type="submit">Log Out</button>
            </form>
          </li>
        </ul>
      </div>

    </div>
  </nav>

  <div class="container shadow p-3 mb-5 bg-body rounded mt-5">
    @yield('content')
  </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>