@extends('admin.index')

@section('container')
    <div class="container">
        <a href="{{ route('user.create') }}">
            <h1>Create User</h1>
        </a>
        <table class="table">
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
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->no_telephone }}</td>
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
                        <td>{{$user->status}}</td>
                        <td><a class="badge bg-info" href="/user/{{$user->id}}/edit">edit</a>  | 
                            {{-- @if ()
                            <a href="" class="badge bg-danger"> nonaktifkan </a></td>
                            
                            @endif --}}
                            @if ($user->status == 'aktif' )
                                <form action="/user/{{ $user->id }}/nonaktif" method="post" class="inline-block">
                                    @method('put')
                                    @csrf
                                    <button type="submit" class="badge bg-danger inline-block">nonaktifkan</button>
                                </form>
                            @else
                                <form action="/user/{{ $user->id }}/aktif" method="post">
                                    @method('put')
                                    @csrf
                                    <button type="submit" class="badge bg-success">aktifkan</button>
                                </form>
                            @endif
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
