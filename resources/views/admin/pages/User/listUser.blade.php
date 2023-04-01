@extends('admin.index')
@section('pagetitle')
    <li class="breadcrumb-item fs-6">Master</li>
    <li class="breadcrumb-item color-primary fs-6 fw-bold">User</li>
@endsection
@section('container')
<div class="" style="width: 98%">
    <div class="font-poppins fs-2 mb-3 color-black">
        List User
    </div>
        <a href="{{ route('user.create') }}">
            <button type="button" class="btn btn-primary mb-3 font-poppins"> <i class="bi bi-plus fs-5"></i>
                Tambah</button>
        </a>
        <div class="table-responsive">
            <table class="table font-poppins table-striped border" id="example">
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
                                <td><a href="https://wa.me/{{ $user->no_telephone }}" target="_blank"
                                        class="badge bg-info p-2">{{ $user->no_telephone }}</a></td>
                                <td>
                                    @if (count($user->ruangan) <= 0)
                                        -
                                    @endif
                                    @foreach ($user->ruangan as $r)
                                        @if ($r->status == 'aktif')
                                        <a href="/master/ruangan" class="text-dark">
                                                {{ $r->nama_ruangan . ',' }}
                                            </a>
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @if ($user->status == 'aktif')
                                        <div class="badge bg-success"><i class="bi bi-check-circle"></i>
                                            {{ $user->status }}
                                        </div>
                                    @else
                                        <div class="badge bg-secondary"><i class="bi bi-dash-circle"></i>
                                            {{ $user->status }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="/master/user/{{ $user->id }}/edit " class="mb-2">
                                            <div class=" btn btn-warning"><i class="bi bi-pencil-square"></i></div>
                                        </a>
                                        @if ($user->status == 'aktif')
                                            <form action="/master/user/{{ $user->id }}/nonaktif" method="post"
                                                class="inline-block">
                                                @method('put')
                                                @csrf
                                                <button type="submit" class="btn btn-danger inline-block"><i
                                                        class="bi bi-x-circle"></i></button>
                                            </form>
                                        @else
                                            <form action="/master/user/{{ $user->id }}/aktif" method="post">
                                                @method('put')
                                                @csrf
                                                <button type="submit" class="btn btn-success"><i
                                                        class="bi bi-check2-circle"></i></button>
                                            </form>
                                        @endif
                                        <!-- Button trigger modal -->
                                        {{-- <a type="button" href="#resetPassword-{{ $user->id }}">
                                            <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#resetPassword-{{ $user->id }}">
                                                <i class="bi bi-key"></i>
                                            </button>
                                        </a> --}}
    
                                    </div>
                            </tr>
                        @endif
    
                        <!-- Modal -->
                        <div class="modal fade" id="resetPassword-{{ $user->id }}" tabindex="-1"
                            aria-labelledby="resetPasswordLabel-{{ $user->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="resetPasswordLabel-{{ $user->id }}">Reset
                                            Password
                                            User {{ $user->nama }} ? </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/master/user/resetPassword/{{ $user->id }}" method="post"
                                            class="form">
                                            @method('put')
                                            @csrf
                                            {{-- <div class="mb-3">
                                                <label for="current_password" class="form-label">Current
                                                    Password</label>
                                                <input type="password" class="form-control" id="current_password"
                                                    name="current_password">
                                            </div> --}}
                                            <div class="mb-3">
                                                <label for="new_password" class="form-label">New
                                                    Password</label>
                                                <input type="password" class="form-control" id="new_password"
                                                    name="new_password">
                                            </div>
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save Password</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
    
                </tbody>
            </table>
        </div></div>

@endsection
