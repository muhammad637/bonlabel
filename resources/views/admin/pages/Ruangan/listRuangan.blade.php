@extends('admin.index')
@section('pagetitle')
    <li class="breadcrumb-item fs-6">Master</li>
    <li class="breadcrumb-item color-primary fs-6 fw-bold">Ruangan</li>
@endsection
@section('container')
    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahRuangan"><i
            class="bi bi-plus fs-5"></i> Tambah Ruangan </button>
    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahRuangan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ruangan.store') }}" method="post" class="container m-1 p-1">
                        @csrf
                        <div class="mb-3">
                            <label for="namaRuangan" class="form-label">Nama Ruangan</label>
                            <input type="text" class="form-control" id="namaRuangan" name="nama_ruangan">
                        </div>

                        <div class="mb-3">
                            <label for="no_telephone" class="form-label">No Telephone</label>
                            <input type="text" class="form-control" id="no_telephone" name="no_telephone">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </div>
                </form>

            </div>

        </div>
    </div>
    </div>
    </div>


    <table class="table font-poppins table-striped border" id="example" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ruangan</th>
                <th>Status</th>
                <th>No Telephone</th>
                <th>Menu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruangans as $ruangan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ruangan->nama_ruangan }}</td>
                    <td>{{ $ruangan->status }}</td>
                    <td>{{ $ruangan->no_telephone }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <div href="#" class="mb-2">
                                <div class=" btn btn-warning"><i class="bi bi-pencil-square" data-bs-toggle="modal"
                                        data-bs-target="#updateRuangan-{{ $ruangan->id }}"></i></div>
                            </div>
                            @if ($ruangan->status == 'aktif')
                                <form action="/master/ruangan/{{ $ruangan->id }}/nonaktif" method="post"
                                    class="inline-block">
                                    @method('put')
                                    @csrf
                                    <button type="submit" class="btn btn-danger inline-block"><i
                                            class="bi bi-x-circle"></i></button>
                                </form>
                            @else
                                <form action="/master/ruangan/{{ $ruangan->id }}/aktif" method="post">
                                    @method('put')
                                    @csrf
                                    <button type="submit" class="btn btn-success"><i
                                            class="bi bi-check2-circle"></i></button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="updateRuangan-{{ $ruangan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Edit Ruangan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="ruangan/{{$ruangan->id}}" method="post" class="container m-1 p-1">
                                  @method('put')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="namaRuangan" class="form-label">Nama Ruangan</label>
                                        <input type="text" class="form-control" id="namaRuangan" name="nama_ruangan" value="{{$ruangan->nama_ruangan}}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_telephone" class="form-label">No Telephone</label>
                                        <input type="text" class="form-control" id="no_telephone" name="no_telephone" value="{{$ruangan->no_telephone}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                            </div>
                            </form>

                        </div>

                    </div>
                </div>
            @endforeach
        </tbody>

    </table>
@endsection
