@extends('admin.index')
@section('pagetitle')
    <li class="breadcrumb-item fs-6">master</li>
    <li class="breadcrumb-item fs-6"><a href="{{ route('user.index') }}" class="text-decoration-none">user</a></li>
    <li class="breadcrumb-item fs-6 color-primary">edit</li>
@endsection
@section('container')

    <section class="font-poppins card" style="width: 98%">
        <div class="container my-3">
            <div class="fs-1 color-black">Form Tambah User</div>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            {{-- nama,username,password,no_telephone,cekLevel --}}
            <div class="row mt-4">
                <div class="col-lg-4 ">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" >
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password">
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
                        <input type="text" class="form-control" id="no_telephone" name="no_telephone" placeholder="example: 62812345678">
                        <div class="form-text">note : ubah angka 0 didepan menjadi kode area negara ex: 62 </div>
                    </div>
                </div>
                <div class="col-12">
                    <p class="form-label">Pilih Ruangan</p>
                    <div class="row mb-3 ms-1">
                        @foreach ($ruangans as $ruangan)
                            @if ($ruangan->user_id == null &&  $ruangan->status == 'aktif')
                                <div class="form-check col-lg-6">
                                    <input type="checkbox" name="ruangan[]" class="form-check-input"
                                        id="{{ $ruangan->nama_ruangan }}" value="{{ $ruangan->id }}">
                                    <label class="form-check-label"
                                        for="{{ $ruangan->nama_ruangan }}">{{ $ruangan->nama_ruangan }}</label>
                                </div>
                            @else
                                <div class="form-check col-lg-6">
                                    <input type="checkbox" name="ruangan[]" class="form-check-input" disabled
                                        id="{{ $ruangan->nama_ruangan }}" value="{{ $ruangan->id }}">
                                    <label class="form-check-label"
                                        for="{{ $ruangan->nama_ruangan }}">{{ $ruangan->nama_ruangan }}</label>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-center mt-5 column-gap-3">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary"> <i class="bi bi-back"></i> Back</a>
                        <button type="submit" class="btn btn-primary"> <i class="bi bi-box-arrow-down"></i> Submit</button>
                    </div>
        </form>
    </div>
    </section>
@endsection
