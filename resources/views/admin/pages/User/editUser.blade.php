@extends('admin.index')
@section('container')
    <form action="/user/{{ $user->id }}" method="POST">
        @method('put')
        @csrf
        {{-- nama,username,password,no_telephone,cekLevel --}}
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input value="{{$user->nama}}"type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" value="{{$user->username}}" class="form-control" id="username" name="username" value="{{$user->name}}">
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">new Password</label>
            <input type="password" value="" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
            <label for="cekLevel" class="form-label">level</label>
            <input type="text" class="form-control" value="{{ $user->cekLevel }}" id="cekLevel" name="cekLevel">
        </div>
        
        <div class="mb-3">
            <label for="no_telephone" class="form-label">No Telephone</label>
            <input type="text" class="form-control" value="{{ $user->no_telephone }}" id="no_telephone" name="no_telephone">
        </div>
        <div class="row mb-2">
            @foreach ($ruangans as $ruangan)
                <div class="form-check col-lg-2">
                    @if ($ruangan->user_id == null)
                        <input type="checkbox" name="ruangan[]" class="form-check-input" id="{{ $ruangan->nama_ruangan }}"
                            value="{{ $ruangan->id }}">
                        <label class="form-check-label"
                            for="{{ $ruangan->nama_ruangan }}">{{ $ruangan->nama_ruangan }}</label>
                    @elseif($ruangan->user_id == $user->id)
                        <input type="checkbox" name="ruangan[]" class="form-check-input" checked
                            id="{{ $ruangan->nama_ruangan }}" value="{{ $ruangan->id }}">
                        <label class="form-check-label"
                            for="{{ $ruangan->nama_ruangan }}">{{ $ruangan->nama_ruangan }}</label>
                    @else
                        <input type="checkbox" name="ruangan[]" class="form-check-input" disabled
                            id="{{ $ruangan->nama_ruangan }}" value="{{ $ruangan->id }}">
                        <label class="form-check-label"
                            for="{{ $ruangan->nama_ruangan }}">{{ $ruangan->nama_ruangan }}</label>
                    @endif
                </div>
            @endforeach
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
