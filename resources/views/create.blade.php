@extends('layout')

@section('content')
    <form action="/store" method="post" class="col-lg-6 m-auto bg-light p-5">
        <form action="/store" method="POST" style="max-width: 500px; margin: auto;">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="Title" name="title" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Description</label><br>
            <textarea name="description" cols="30" rows="10"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection