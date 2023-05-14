@extends('pages.index')
@section('pagetitle')
    <li class="breadcrumb-item color-primary fs-6 fw-bold">ubahStock</li>
@endsection
@section('container')
    <section class="section" style="width:98%">
        <div class="row">
            <div class="font-poppins fs-2 mb-3 color-black">
                List Produk
            </div>
            <div class="col-lg-12">
                <!-- Table with stripped rows -->
                <table class="table font-poppins table-striped border" id="example">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Product</th>
                            <th scope="col">Jenis Product</th>
                            <th scope="col">Jumlah Stock</th>
                            <th scope="col">Status Product</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->nama_product }}</td>
                                <td>{{ $data->jenis_product }}</td>
                                <td>{{ $data->jumlah_stock }} {{$data->satuan}} </td>
                                <td>
                                    @if ($data->status == 'aktif')
                                        <button type="button" class="border-0 badge bg-success"><i class="bi bi-check-circle"></i> {{ $data->status }}</button>
                                    @endif
                                    @if ($data->status == 'nonaktif')
                                        <button type="button" class="border-0 badge bg-secondary"><i class="bi bi-dash-circle"></i>{{ $data->status }}</button>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <div class="mb-2">
                                            <div class=" btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#tambahin-{{ $data->id }}">tambahin</div>
                                        </div>

                                        <div class="mb-2">
                                            <div class=" btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#kurangin-{{ $data->id }}">kurangin</div>
                                        </div>


                                        <!-- Modal bertambah -->
                                        <div class="modal fade" id="tambahin-{{ $data->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Form Tambahin Stok</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="ubahStock/{{$data->id}}/tambahi" method="post"
                                                            class="container m-1 p-2">
                                                            @method('put')
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="nama_product" class="form-label">Nama
                                                                    Product</label>
                                                                <input type="text" class="form-control" id="nama_product"
                                                                     disabled value="{{ $data->nama_product }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="jenis_product" class="form-label">Jenis
                                                                    Product</label>
                                                                <input type="text" class="form-control"
                                                                    id="jenis_product"  disabled
                                                                    value="{{ $data->jenis_product }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="jumlah_stock" class="form-label">Tambahin
                                                                    Stock</label>
                                                                    <div class="d-flex gap-2">
                                                                        <button type="button" class="btn btn-danger kurang">-</button>
                                                                        <input type="number" min="0" class="form-control counter" id="jumlah_stock"
                                                                        name="jumlah_stock" value="0">
                                                                        <button type="button" class="btn btn-success tambah">+</button>
                                                                    </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="kurangin-{{ $data->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Form Kurangin Stock</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="ubahStock/{{$data->id}}/kurangi" method="post"
                                                            class="container m-1 p-2">
                                                            @method('put')
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="nama_product" class="form-label">Nama
                                                                    Product</label>
                                                                <input type="text" class="form-control" id="nama_product"
                                                                     disabled value="{{ $data->nama_product }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="jenis_product" class="form-label">Jenis
                                                                    Product</label>
                                                                <input type="text" class="form-control"
                                                                    id="jenis_product"  disabled
                                                                    value="{{ $data->jenis_product }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="jumlah_stock" class="form-label">kurangin
                                                                    Stock</label>
                                                                    <div class="d-flex gap-2">
                                                                        <button type="button" class="btn btn-danger kurang">-</button>
                                                                        <input type="number" min="0" class="form-control counter" id="jumlah_stock"
                                                                        name="jumlah_stock" value="0">
                                                                        <button type="button" class="btn btn-success tambah">+</button>
                                                                    </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                       
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
            </div>
        </div>

        </div>
        </div>
    </section>
@endsection
