@extends('layout')

@section('content')
<form class="col-lg-6 m-auto" method="POST" action="/register">
  @csrf
  <fieldset>
    
    <legend> Halaman Register</legend>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Username</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Insert Username" name="username">
    </div>
    <div class="mb-3">
      <label for="disabledSelect" class="form-label">Email</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Insert Email" name="email">
      </select>
    </div>
    <div class="mb-3">
      <label for="disabledSelect" class="form-label">Password</label>
      <input type="password" id="disabledTextInput" class="form-control" placeholder="Insert Password" name="password">
      </select>
    </div>
</div>
<div class="mb-3">
  <label for="disabledSelect" class="form-label">Nama lengkap</label>
  <input type="text" id="disabledTextInput" class="form-control" placeholder=" Insert Nama lengkap" name="name">
  </select>
</div>
    <div class="mb-3">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled>
        <label class="form-check-label" for="disabledFieldsetCheck">
          Can't check this
        </label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <h1>{{ session('berhasil') }}</h1>
  </fieldset>
</form>
{{-- @endsection --}}