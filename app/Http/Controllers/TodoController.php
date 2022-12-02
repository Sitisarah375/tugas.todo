<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        return view('dasboard.login');
    }

    public function register(){
        return view('dasboard.register');
    }
    
    // public function todo(){
    //     return view('dasboard.todo');
    // }
    
    public function todo(){
    //ambil data  dari table todos dengan model Todo
    // all() fungsinya untuk menggambil semua data ditable
    //filter data di databease -> where('column', 'prtbandingan', 'value')
    $todos = Todo::where('user_id', '=', Auth::user()->id)->get();
    //kirim data yang sudah diambil ke file blade / ke file yang menampilkan halaman
    //kirim melalui compact()
    //isi compact sesuaikan dengan nama variable
    return view('dasboard.todo', compact('todos'));
    }
 
    public function about(){
        return view('dasboard.about');
    }
    
    public function home(){
        return view('dasboard.home');
    } 

    public function dasboard(){
        return view('dasboard.dasboard');
    }

    public function auth(Request $request){
        
        // {//dd($request->all()); // }

         $request->validate([
          'username'=>'required|exists:users,username',
          'password'=>'required',
         ],[
            'username.exists'=>
            'username ini belum tersedia',
            'username.required'=>
            'username ini harus diisi',
            'password.required'=>
            'password ini harus diisi',
         ]);
         $user = $request->only('username', 'password');
         if(Auth::attempt($user)){
            return redirect()->route('todo');
         }else{
            return redirect()->back()->with('eror', 'Gagal Login', 'Silahkan cek dan coba lagi');
         }
}
     
    public function logout()
    {
        //menghapus history login
        Auth::logout();
        //mengarahkan ke halaman login lagi
        return redirect('/');
    }
    
    public function registerAccount(Request $request){
        $request->validate([
            'email' =>'required|email:dns',
            'username' =>'required|min:4|max:8',
            'password' =>'required|min:4',
            'name' =>'required|min:3',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/')->with('success', 'berhasil menambah akun! silahkan login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('dasboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //// dd($request->all());

        $request->validate([
            'title'=>'required|min:3',
            'date'=>'required',
            'description'=>'required|min:5',
        ]);
        
        //mengirim data ke database table todos dengan model Todo
        //'' = nama column ditable db
        //$request -> =value attribute name pada input
        // kenapa yang dikirim 5 data? karena table pada db Todos membutuhkan 6 column input
        // salah satunya column 'done_time' yang tipenya nullable, karena nullable jadi ga perlu dikirim nilai
        // 
        //
        //

        Todo::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/todo')->with('successAdd', 'Mantap Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */

    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //menampilkan halaman input form edit
        //mengambil data satu baris ketika column id pada baris tersebut sama dengan id dari parameter route
        $todo = Todo::where('id', $id)->first();
        //kirim data yang diambil ke file blade dengan compact
        return view('dasboard.edit', compact('todo')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */

    public function complated()
    {
        return view('dashboard.completed');
    }

    public function updateComplated($id)
    {
        //cara data yang mau diubah statusnya jadi 'complated' dan column 'done_time' yang tadinya null, diisi dengan tanggal  sekarang(tgl)
        Todo::where('id', $id)->update([
            'status'=>1,
            'done_time' =>\Carbon\Carbon::now(),
        ]);
        return redirect()->back()->with('done', 'todo telah selesai dikerjakan');
    }

    public function update(Request $request,$id)
    {
        //
        $request->validate([
            'title'=>'required|min:3',
            'date'=>'required',
            'description'=>'required|min:5',
        ]);
        //cari baris data yang punya id sama dengan data id yang dikirim ke parameter route
        // kalau udah ketemu, update column-column datanya
        Todo::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'user_id' => Auth::user()->id,
            'status' => 0,
        ]);
        // kalau berhasil halaman bakal di redirect ulang ke halaman awal todo dengan pesan pemberitahuan
        return redirect('/todo/')->with('successUpdate', 'Data todo berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        Todo::where('id', '=', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data Todo!');
        // $todo = Todo::findOrFail($id);
        // $todo->delete();
        // return redirect('/todo/')->with('successDelete', 'Berhasil Menghapus!');
    }
}