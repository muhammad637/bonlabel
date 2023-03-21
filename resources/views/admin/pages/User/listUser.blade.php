@extends('admin.index')

@section('container')

@foreach ($users as $user)
    <div class="my-5">
    <h1>{{ $user->nama}}</h1>
    <h2>{{ $user->username}}</h2>
    <h3>{{$user->no_telephone}}</h3>
    <p>{{$users[0]->ruangan[0]->nama_ruangan}}</p>
    <ul>
    @foreach ($user->ruangan() as $item)
    <li>{{$item->id_ruangan}}</li>    
    @endforeach
    </ul>
    {{-- <h4>{{ $user->ruangan}}</h4> --}}
    </div>

@endforeach
    
@endsection