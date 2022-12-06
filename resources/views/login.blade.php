<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login</title>
</head>
<body>
    <h1>Halaman Login</h1>
    <br>
    @if (session('succesRegister'))
    <p style="color:red">{{session('succesRegister')}}</p>
    @endif
    <form action="{{ route('login-baru') }}" method="POST">
        @csrf
        Email <input type="email" name="email" placeholder="Masukan Email">
        <br>
        Password <input type="password" name="password" placeholder="Masukan Password">

        <button type="submit">Login</button>
        <br>
        
        @if(session('error'))
        {{session('error')}}
        @endif

        @if(session('islogin'))
        {{session('islogin')}}
        @endif

    </form>
</body>