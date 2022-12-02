<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TODO</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/sarah.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}"
    type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&family=Secular+One&display=swap" rel="stylesheet">   
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script> --}}
</head>
<body>

{{-- @if(Auth::check())
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <a class="navbar-brand" href="#">TODO</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>     
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link active" href="{{ url('/')}}" aria-current="page" href="#">Login</a>
            </li>
            <li>
                <a href="/logout">Logout</a>
        </form>
      </div>
    </div>
  </nav>
  @endif --}}

  @if(Auth::check())
{{--<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">--}}
<nav class="navbar navbar-expand-lg fixed-top shadow-sm" style="background-color: rgb(255, 255, 255)" id="mainNav">
  <div class="container-fluid">
        <a class="navbar-brand fw-light ms-5" href="#page-top">Todo Website</a>
  <div class="collapse navbar-collapse ms-4" id="navbarTogglerDemo03">
    <ul class="navbar-nav me-auto mb-3 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Todo
        </a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="/todo">My Todo's</a></li>
    </ul>
      </li>
    </ul>     
    <ul class="nav nav-pills">
  <div class="btn-group dropstart">
        <a href="#" class="m-2 text-light" data-bs-toggle="dropdown" aria-expanded="false">
         <i class="fas fa-user-circle" style="font-size: 40px; color:black;"></i>
        </a>
{{--bg-dark" style="font-size: 30px; border-radius:100px;"></i>--}}
{{-- <i class="fas fa-user-circle bg-primary" style="font-size: 40px"></i> --}}
   <ul class="dropdown-menu position-absolute">
   <li><a class="dropdown-item disabled" href="#">Hai, {{ Auth::user()->username }}</a></li>
   <li><hr class="dropdown-divider"></li>
   <li><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
   <li><a class="dropdown-item" href="/dasboard"><i class="fas fa-blog"></i> Dasboard</a></li>

   {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   {{-- box icons --}} 
   </li>
   </ul>
  </div>
  </div>
  </div>
</nav>
  @endif
  @yield('content')
</body>
</html>