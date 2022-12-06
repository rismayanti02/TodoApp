@extends('layout')

@section('content')
<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>

  <form action="{{ route('login-baru') }}" class="login-container" method="POST">
    @csrf
    <p><input type="email" placeholder="Email" name="email"></p>
    <p><input type="password" placeholder="Password" name="password"></p>
    <p><input type="submit" value="Log in"></p>
  </form>
</div>
@endsection

