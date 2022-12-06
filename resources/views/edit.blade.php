@extends('layout')

@section('content')
    <form action="/update/{{$todo['id']}}" method="post" class="col-lg-6 m-auto bg-light p-5">
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
                {{-- fungsi csrf untuk mengirim data ke controler yang ditampung oleh request $request --}}
        @csrf
        {{-- karena attribute method pada tag form cumsn bisa GET/POST sedangakn buat update data itu pake method PATCH,jdi methode ="pots" difrrom ditimpa sama methode patch ini--}}
        @method('PATCH')
        <div class="mb-3">
            <label class="form-label">Title</label>
            {{-- artibuth value berfungsi untuk menampilkan data diinputnya yang ditmpilin merupakan data yang diambildicontroller dan dikirim lewat compect --}}
            <input type="text" name="title" class="form-control" value="{{ $todo ['title'] }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control" value="{{ $todo ['date'] }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Description</label><br>
            {{-- kenapa textarea gapunya atribut value?karena text area bukan termasuk tag input/select dan dia punya penutup tag,jadi buat nampilinnya lansung tanpa artibut value --}}
            <textarea name="description" cols="30" rows="10">{{ $todo ['descripton'] }}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection