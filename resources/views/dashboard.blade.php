@extends('layout')

@section('content')
<a href={{route('logout')}} style="color:rgb(37, 37, 85); text-style:underline">Logout</a> 

<div class="container">

    <h1>
        Username : {{ auth()->user()->username }}
    </h1>
    <h1>
        Email : {{ auth()->user()->email }}
    </h1>
    @if (Session::get('addTodo'))
         <div class="alret alret-success">
            {{Session::get('addTodo')}}
         </div>
         @endif
    
    <h1>Selamat Datang di Halaman Dashboard</h1>
    @if(session('isGuest'))
    <h2>
        <b>
            <i>
                {{ session('isGuest')}}
            </i>
        </b>
    </h2>
</div>
@endif

@endsection