<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan halaman awal dan menampilkan semua data
        return view('login1');

    }
    public function register()
    {
        return view('register');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
        //menampilkan halaman form input tambah data
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Mengirim data ke Databes
        $request->validate([
            'title' =>'required|min:3',
            'date' =>'required',
            'description' =>'required|min:3',
           ]);
           //kirim data kedatabase yg table todos :model Todo
           Todo::create(['title'=>$request->title,
           'date' =>$request->date,
           'description'=> $request->description,
           'user_id'=> Auth::user()->id,
           'status'=>0,
        ]);
        // kalau berhasil arahkan kehalaman data dengan pemberitahuan berhasil

        return redirect('/dashboard')->with('addTodo','Berhasil menambhkan data Todo!');
    }

    public function data(){
        //ambil data dari table todos
        $todos =Todo::all();
        //compect untuk mengirim data ke bladenya
        //isi dicompect hrs sama kaya nama variablenaya
        return view('data', compact('todos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //Menampilkan satu data spesific
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Menampilkan halaman form input edit data
        $todo = Todo::where('id', $id)->first();
        return view('edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi
        $request->validate([
            'title' =>'required|min:3',
            'date' =>'required',
            'description' =>'required|min:8',
           ]);
           //kirim data kedatabase yg table todos :model Todo
           Todo::where('id', $id)->update([
            'title'=> $request->title,
           'date' =>$request->date,
           'description'=> $request->description,
           'user_id'=> Auth::user()->id,
           'status'=>0,
        ]);
        // cari baris data yang pnya value colume id sama dengan id yang dikirim route
return redirect('/data')->with('successUpdate', 'Berhasil mengubah data Todo!');
        //Mengapdate data di databes
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //cari data yang mau dihapus kalo ketemu langsung hapus datanya 
        Todo::where('id', $id)->delete();
        // menghapus adata secara spesific
        return redirect('/data')->with('successDelete','Berhasil menghapus data Todo!');
    }

    public function updateToComplated(Request $request, $id)
    {
        Todo::where('id', '=', $id)->update([
            'status' => 1,
            'done_time' => \Carbon\Carbon::now(),
        ]);

        return redirect()->back()->with('done', 'Todo telah selesai dikerjakan');
    }
}
//validasi from
