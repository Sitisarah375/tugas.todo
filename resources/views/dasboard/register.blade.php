@extends('dasboard.layout')
@section('content')
<body style="background-image: url('https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?w=2000')">
    @if ($errors->any())
    <div class="alert alert-danger">
       <ul>
        @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
        @endforeach
           </ul>
    </div>
        @endif        

    <div class="container vh-100">

        <!-- Outer Row -->
        <div class="row d-flex justify-content-center align-item-center h-100">
            <div class="col-10 my-auto">
                <div class="card o-hidden border-0 shadow-lg" >
                    <div class="card-body p-0">

        <!-- Nested Row within Card Body -->
    <div class="card">
        <div class="row">
            <div class="col-6" style="margin-top: 130px" >
                <img src="{{ asset('assets/img/sarahh.png')}}" alt="" style="width:470px">
            </div> 
            <div class="col-lg">             
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h3 text-gray-900">Welcome To!</h1>
                                        <p>Register</p>
                                    </div>
                                    <form class="user" action="{{route('register-input')}}" method="POST">
                                        @csrf
                                        <h5 class=mt-2> Nama </h5>
                                        <div class="form-group">
                                            <input type="nama" class="form-control form-control-user" id="exampleInputNama" placeholder="Nama" name="name">
                                        </div>
                                        <h5 class=mt-2> Email </h5>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan Email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <h5 class=mt-2> Username </h5>
                                            <input type="username" class="form-control form-control-user" id="exampleInputUsername" placeholder="Username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <h5 class=mt-2> Password </h5>
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <br>
                                        <div class="form-group">             
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block w-100" type="submit">Register</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                      </div>
                    </div>
                  </div>
               </div>
            </div>
        </div> 
        
         
    </div>
    </body>
@endsection