@extends('layout')

@section('content')
     @if (session('successUpdate'))   
     <div class="alert alert-success">
       {{session('succesUpdate')}}
     </div>
     @endif
     @if (session('successDelete'))
     <div class="alert alert-danger">
       {{session('successDelete')}}
     </div>
     @endif
     @if (session('successComplated'))
     <div class="alert alert-danger">
       {{session('successComplated')}}
     </div>
     @endif

   <table class="table table-success table-striped table-bordered">
     <tr>
        <td>No</td>
        <td>Kegiatan</td>
        <td>Deskripsi</td>
        <td>BatasWaktu</td>
        <td>Status</td>
        <td>Aksi</td>
     </tr>
     @php
         $no = 1;
         @endphp
         @foreach ($todos as $todo)
         <tr>
            {{--tiap dilooping,$no bakal ditambah 1--}}
            <td>{{ $no++ }}</td>
            <td>{{ $todo['title'] }}</td>
            <td>{{ $todo['description'] }}</td>
            {{--Carbon :package date laravel,nntinya si date yg 2022-11-22 formatya jadi 22 November,2022--}}
            <td>{{ \Carbon\Carbon::parse($todo['date'])->Format('j F,Y') }}</td>
            {{-- konsep ternerya,if statusnya 1 nampilin teks complated kalo 0 nampilin teks on-process, status tuh bolean kan? cmn antar 1 atau 0--}}
            <td>{{ $todo['status'] == 1? 'Complated' : 'On-Process' }}</td>
            <td>
               {{-- karena parth(id)merupakan path dinamis,jdi kita harus isi path dinamis terseut
                  karena kita mengisinya dengan data dinamis /data dari databes jdi buat isinya 
                  pake kurung kuraawal dua kali --}}
               <a href="/edit/{{$todo['id']}}">Edit</a>
               <form action="/destroy/{{$todo['id']}}" method="POST">
                  @csrf
                  @method('DELETE')
                  | <button type="submit">hapus</button>
               </form>
               {{-- button hanya muncul ketika statusnya masih on-process --}}
               @if ($todo['status'] == 0)
               <form action="/complated/{{$todo['id']}}"method="POST">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="btn btn-success">complated</button>
               </form>
               @endif
            </td>
            @endforeach

    </table>
    @endsection

