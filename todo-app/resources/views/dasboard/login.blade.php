@extends('dasboard.layout')
@section('content')

<body style="background-image: url('https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?w=2000')">
    
    <div class="container vh-100">

    <!-- Outer Row -->
    <div class="row d-flex justify-content-center align-item-center h-100">
      <div class="col-8 my-auto">
        <div class="card o-hidden border-0 shadow-lg" >
           <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                 <div class="col-6" style="margin-top: 50px" >
                    <img src="{{ asset('assets/img/sarahh.png')}}" alt="" style="width:460px">
                 </div> 
                     <div class="col-lg">
                        @if ($errors->any())
                     <div class="alert alert-danger">
                         <ul>
                        @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                        @endforeach
                         </ul>
                     </div>
                        @endif
                        @if (Session::get('notAllowed'))
                            <div class="alert alert-danger">
                                {{Session::get('notAllowed')}}
                            </div>
                        @endif
                              <div class="p-5">
                                <div class="text-center">                                   
                                    <h1 class="h3 text-gray-900">Welcome Back!</h1>
                                    <p>Please Login</p>
                                </div>
                      <form class="user" method="POST" action="{{route('login-auth')}}">
                        @csrf
                        <h5 class=mt-2> Username </h5>
                        <div class="form-group">
                            <input type="username" class="form-control form-control-user" id="exampleInputUsername" placeholder="Username" name="username">
                        </div>
                        <div class="form-group">
                        <h5 class=mt-2> Password </h5>
                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success btn-user btn-block">Login</button>
                    </form>                  
                        <div class="text-center">
                            <a class="small" href="/register">Create an Account!</a>
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