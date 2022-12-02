@extends('dasboard.layout')
@section('content')

  {{--halaman satu--}}
  <style>

    h1{
     margin-top: 250px;
    }
    </style>

  <div class="container">
  <div class="d-flex">
  <div class="col-6"> 
  <div data-aos="fade-right"></div>
    <h1 class="fw-bold fs-2 text text-dark" style="font-family: 'Nerko One', cursive; font-family: 'Secular One', sans-serif; margin-left:60px; margin-top:300px;">SELAMAT DATANG<br>DI HOME PAGE</h1>
  </div>
    <img src="{{ asset('assets/img/home.png')}}" class= "col-6" style="margin-left:50px; margin-top:150px;">
  </div>
  </div>
  </div>
  
  {{--halaman dua--}}

  <div class="card-group" style="margin-top: 200px">
  <div class="card bg-transparent  o-hidden border-0 mx-auto" >
    <img src="{{ asset('assets/img/todo.png')}}" class="figure-img img-fluid rounded m-auto" style="border: 1px solid;" alt="..." width="80%">
  <a href="/todo" class="text-decoration-none fw-bold fs-3 text text-dark" style="margin-top:10px;text-align:center" style="font-family:'Times New Roman', Times, serif">MY TODO'S</a>
  </div>
   <br>
  <div class="card bg-transparent o-hidden border-0" >
    <img src="{{ asset('assets/img/todo.png')}}" class="figure-img img-fluid rounded m-auto" style="border: 1px solid;" alt="..." width="80%">
  <a href="/create" class="text-decoration-none fw-bold fs-3 text text-dark" style="margin-top:10px;text-align:center" style="font-family:'Times New Roman', Times, serif ">CREATE</a>
  </div>
  <br>
  <div class="card bg-transparent o-hidden border-0" >
    <img src="{{ asset('assets/img/todo.png')}}" class="figure-img img-fluid rounded m-auto" style="border: 1px solid;" alt="..." width="80%">
  <a class="text-decoration-none fw-bold fs-3 text text-dark" style="margin-top:10px; text-align:center" style="font-family:'Times New Roman', Times, serif" href="">COMPLATED</a>
  </div>
  </div>
  </div> 
  <div style="margin-top: 100px">
  </div>
  </body>
  </html>
@endsection