<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Laravel CRUD</title>
</head>
<body style="background-color: #f8f9fa;">

    <nav class="navbar" style="background-color: white;">
        <div class="container">
          <a class="navbar-brand">Welcome</a>
          <div class="d-flex">
            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/posts') }}" class="btn btn-light border">Posts</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-light border">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-light border">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
          </div>
        </div>
      </nav>

      <div class="container my-3">
          <div class="card text-center">
            <div class="card-header">
                Welcome to the page!
            </div>
            <div class="card-body">
              <h5 class="card-title">Please log in or register!</h5>
              <a href="{{ route('login') }}" class="btn btn-outline-primary border">Log in</a>
              <a href="{{ route('register') }}" class="btn btn-outline-primary border">Register</a>
            </div>
            <div class="card-footer text-muted">:)</div>
          </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>