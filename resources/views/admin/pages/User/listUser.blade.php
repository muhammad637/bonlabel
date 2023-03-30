@extends('admin.index')
@section('pagetitle')
    <li class="breadcrumb-item fs-6">Master</li>
    <li class="breadcrumb-item active fs-6 fw-bold">User</li>
@endsection
@section('container')
    <a href="{{ route('user.create') }}">
        <button type="button" class="btn btn-primary mb-3 font-poppins"> <i class="bi bi-file-plus-fill fs-5"></i>
            Tambah</button>
    </a>
    <table class="table font-poppins " id="dataTable">
        <thead>
            <tr>
                <th scope="col">no</th>
                <th scope="col">Nama</th>
                <th scope="col">User</th>
                <th scope="col">No Hp</th>
                <th scope="col">ruangan</th>
                <th scope="col">status</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            @if ($user->id != auth()->user()->id)    
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->username }}</td>
                <td><a href="https://wa.me/{{$user->no_telephone}}" class="badge bg-info p-2">{{ $user->no_telephone }}</a></td>
                <td>
                    @if (count($user->ruangan) <= 0)
                        -
                    @endif
                    @foreach ($user->ruangan as $r)
                        @if ($r->status == 'aktif')
                            <a href="" class="btn btn-success ml-2 my-2"> {{ $r->nama_ruangan . ',' }}</a>
                        @endif
                    @endforeach
                </td>
                <td>
                    @if ($user->status == 'aktif')
                    <div class="badge bg-success"><i class="bi bi-check-circle"></i> {{ $user->status }}</div> 
                    @else
                    <div class="badge bg-secondary"><i class="bi bi-dash-circle"></i> {{ $user->status }}</div> 
                        
                    @endif
                </td>
                <td>
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <a class="btn btn-info" href="/master/user/{{ $user->id }}/edit">edit</a> 
                        </div>
                        <div class="col-4">
                            @if ($user->status == 'aktif')
                                <form action="/master/user/{{ $user->id }}/nonaktif" method="post" class="inline-block">
                                    @method('put')
                                    @csrf
                                    <button type="submit" class="btn btn-danger inline-block">nonaktifkan</button>
                                </form>
                            @else
                                <form action="/master/user/{{ $user->id }}/aktif" method="post">
                                    @method('put')
                                    @csrf
                                    <button type="submit" class="btn btn-success">aktifkan</button>
                                </form>
                            @endif
                        </div>
                    </div>
            </tr>
            @endif
            @endforeach

        </tbody>
    </table>
@endsection
