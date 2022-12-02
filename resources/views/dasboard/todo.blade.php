@extends('dasboard.layout')
@section('content')

    {{--allert--}}
    <div class="wrapper bg-light" style="margin-top: 150px">
        @if (Session::get('notAllowed'))
          <div class="alert alert-danger">
            {{Session::get('notAllowed')}}
          </div>
        @endif
        @if (Session::get('successAdd'))
          <div class="alert alert-success">
            {{Session::get('successAdd')}}
          </div>
        @endif
        @if (Session::get('successUpdate'))
        <div class="alert alert-success">
          {{Session::get('successUpdate')}}
        </div>
        @endif
        @if (Session::get('deleted'))
        <div class="alert alert-success">
          {{Session::get('deleted')}}
        </div>
        @endif
        @if (Session::get('done'))
        <div class="alert alert-success">
          {{Session::get('done')}}
        </div>
        @endif
    
    <div class="d-flex align-items-start justify-content-between">
    <div class="d-flex flex-column">
    <div class="h5">My Todo's</div>
        <p class="text-muted text-justify">
                  Here's a list of activities you have to do
        </p>
        <br>
      <span>
          <a  href="/create" class="text-success text-decoration-none">Create</a> <a class="text-decoration-none" href="">Complated</a>
      </span>
    </div>
    <div class="info btn ml-md-4 ml-0">
       <span class="fas fa-info" title="Info"></span>
    </div>
    </div>
    <div class="work border-bottom pt-3">
    <div class="d-flex align-items-center justify-content-between py-2 mt-1">
    <div class="d-flex">
       <span class="text-muted fas fa-comment btn"></span>
    <div class="text-muted" >{{$todos->count()}} todos</div>

    </div>
    <button class=" btn text-muted fas fa-angle-down" type="button" data-toggle="collapse"
            data-target="#comments" aria-expanded="false" aria-controls="comments" ></button>
    </div>
    </div>
    <div id="comments d-flex flex-column" class="mt-1">
        {{-- looping data-data dr compact 'todos' agar dapat ditampilkan per baris datanya --}}
        @foreach ($todos as $todo)
        
    <div class="comment d-flex align-items-start justify-content-between">
    <div class="mr-2">
      @if ($todo['status'] == 1)
      <span class="fa-solid fa-bookmark text-secondary btn"></span>
      {{-- kalau statusnya selain dari 1, baru mjuncul icon checklist yang bisa diclick bbuat update ke complated 11--}}
      @else 
           <form action="/complated/{{$todo['id']}}"method="POST">
             @csrf
             @method('PATCH')
             <button type="submit" class="fas fa-circle-check fa-1x text-primary btn"></button>
           </form>
           @endif
            {{-- <span class="checkmark"></span> --}}
    </div>
    <div class="d-flex flex-column w-75">
        {{-- menampilkan data dinamis/data yg diambil dari db pada blade harus menggunakan {{}} --}}
        {{-- path yang {id} dikirim data dinamis (data dr db) makannya disitu pake {{}} --}}
        {{-- <a href="{{route('edit', $todo->id)}}" class="text-justify"> --}}
            {{-- /edit/{{$todo['id']}} --}}
           <a class="text-decoration-none" href="{{route('edit', $todo->id)}}"> {{ $todo['title']}}</a>
        </a>
        <p>{{ $todo['description'] }}</p>
        {{-- konsep ternary :if column status baris ini isinya 1 bakal munculin teks 'Complated
        selain dari itu akan menampilkan teks 'On-Process--}}
            <p class="text-muted">
            {{ $todo['status'] == 1 ? 'Complated' : 'On-Process' }} 
            {{-- Carbon itu package laravel untuk mengelola yg berhubungan dengan date. Tadinya 
            value column date di db kan bentuknya format 2022-11-22 nah kita pengen ubah bentuk 
            formatnya jadi 22 November, 2022 --}}
            <span class="date">
              @if ($todo['status'] == 1)
              selesai pada : {{\Carbon\Carbon::parse($todo['done_time'])->format('j F, Y')}}
              @endif
            </span>
  
            </p>
            {{-- <a href="{{route('edit', $todo->id)}}" class="btn btn-primary opacity-50" style="border-radius: 8px;">edit</a> --}}
    </div>
     <div class="ml-auto">
    {{-- <div class="ml-md-4 ml-0 d-flex" style="flex-direction: column; justify-content:end;">  --}}
            <a class="dropdown-item"  href="{{route('edit', $todo->id)}}"><i class="fas fa-pencil-square" style="float: right"></i></a>
            <br>
            <a class="dropdown-item"  href="{{route('delete', $todo->id)}}"><i class="fa fa-trash" style="float: right"></i></a>
     </div>
    </div>
    @endforeach 
  </div> 
    </div>
    

@endsection