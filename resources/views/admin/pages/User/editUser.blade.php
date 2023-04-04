@extends('admin.index')
@section('pagetitle')
    <li class="breadcrumb-item fs-6">master</li>
    <li class="breadcrumb-item fs-6"><a href="{{ route('user.index') }}" class="text-decoration-none">user</a></li>
    <li class="breadcrumb-item fs-6 color-primary">edit</li>
@endsection
@section('container')
    <section class="font-poppins">
        <form action="/master/user/{{$user->id}}" method="POST">
            @method('put')
            @csrf
            {{-- nama,username,password,no_telephone,cekLevel --}}
            <div class="row mt-4">
                <div class="col-lg-4 ">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$user->nama}}">
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}">
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="mb-3">
                        <label for="password" class="form-label">Reset Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="masukkan new password">
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="mb-3">
                        <label for="cekLevel" class="form-label">level</label>
                        <select class="form-select" aria-label="Default select example" name="cekLevel">
                            <option selected value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="mb-3">
                        <label for="no_telephone" class="form-label">No Telephone</label>
                        <input type="text" class="form-control" id="no_telephone" name="no_telephone" placeholder="example: 62812345678" value="{{$user->no_telephone}}">
                        <div class="form-text">note : ubah angka 0 didepan menjadi kode area negara ex: 62 </div>
                    </div>
                </div>
                <div class="col-12">
                    <p class="form-label">Pilih Ruangan</p>
                    <div class="row mb-3 ms-1">
                        @foreach ($ruangans as $ruangan)
                            <div class="form-check col-lg-6">
                                @if ($ruangan->user_id == null &&  $ruangan->status == 'aktif')
                                    <input type="checkbox" name="ruangan[]" class="form-check-input"
                                        id="{{ $ruangan->nama_ruangan }}" value="{{ $ruangan->id }}">
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

                    <div class="d-flex justify-content-center mt-5 column-gap-3">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary"> <i class="bi bi-back"></i> Back</a>
                        <button type="submit" class="btn btn-primary"> <i class="bi bi-box-arrow-down"></i> Submit</button>
                    </div>
        </form>

    </section>
@endsection
