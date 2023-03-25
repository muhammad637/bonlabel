@extends('admin.index')
@section('container')
    @csrf
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
      {{-- nama,username,password,no_telephone,cekLevel --}}
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" >
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="wpratiwi">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="cekLevel" class="form-label">level</label>
            <input type="text" class="form-control" id="cekLevel" name="cekLevel">
        </div>
        <div class="mb-3">
            <label for="no_telephone" class="form-label">No Telephone</label>
            <input type="text" class="form-control" id="no_telephone" name="no_telephone">
        </div>
        <div class="row mb-2">
            @foreach ($ruangans as $ruangan)
                @if ($ruangan->user_id == null)
                    <div class="form-check col-lg-2">
                        <input type="checkbox" name="ruangan[]" class="form-check-input" id="{{ $ruangan->nama_ruangan }}"
                            value="{{ $ruangan->id }}">
                        <label class="form-check-label"
                            for="{{ $ruangan->nama_ruangan }}">{{ $ruangan->nama_ruangan }}</label>
                    </div>
                    @else
                    <div class="form-check col-lg-2">
                      <input type="checkbox" name="ruangan[]" class="form-check-input"  disabled id="{{ $ruangan->nama_ruangan }}"
                          value="{{ $ruangan->id }}">
                      <label class="form-check-label"
                          for="{{ $ruangan->nama_ruangan }}">{{ $ruangan->nama_ruangan }}</label>
                  </div>
                @endif
            @endforeach
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
