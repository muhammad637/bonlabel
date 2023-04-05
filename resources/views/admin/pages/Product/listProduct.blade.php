@extends('pages.index')
@section('pagetitle')
    <li class="breadcrumb-item fs-6">Master</li>
    <li class="breadcrumb-item color-primary fs-6 fw-bold">Produk</li>
@endsection
@section('container')
    <section class="section">
        <div class="row">

            <div class="font-poppins fs-2 mb-3 color-black">
                List Produk
            </div>
            <div class="col-lg-12">
                {{-- <a href="{{ route('product.create') }}">
                        <button type="button" class="btn btn-primary mb-3 font-poppins"> <i class="bi bi-plus fs-5"></i>
                            Tambah Product</button></a>
                    <br> --}}
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahProduct"><i
                        class="bi bi-plus fs-5"></i> Tambah </button>

                <!-- Modal -->
                <div class="modal fade" id="tambahProduct" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('product.store') }}" method="post" class="container m-1 p-1">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama_product" class="form-label">Nama Product</label>
                                        <input type="text" class="form-control" id="nama_product" name="nama_product">
                                    </div>

                                    <div class="mb-3">
                                        <label for="jenis_product" class="form-label">Jenis Product</label>
                                        <input type="text" class="form-control" id="jenis_product" name="jenis_product">
                                    </div>

                                    {{-- <div class="mb-3">
                      <label for="statusProduct" class="form-label">Status</label>
                      <input type="text" class="form-control" id="statusProduct" name="statusProduct">
                    </div> --}}


                                    <div class="mb-3">
                                        <label for="limit_order" class="form-label">Limit Order</label>
                                        <input type="number" class="form-control" id="limit_order" name="limit_order">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah_stock" class="form-label">jumlah Stock</label>
                                        <input type="number" class="form-control" id="jumlah_stock" name="jumlah_stock">

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
                </div>
                <!-- Table with stripped rows -->
                <table class="table font-poppins table-striped border" id="example">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Product</th>
                            <th scope="col">Jenis Product</th>
                            <th scope="col">Limit Order</th>
                            <th scope="col">Jumlah Stock</th>
                            <th scope="col">Status Product</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->nama_product }}</td>
                                <td>{{ $data->jenis_product }}</td>
                                <td>{{ $data->limit_order }}</td>
                                <td>{{ $data->jumlah_stock }}</td>
                                <td>
                                    @if ($data->status == 'aktif')
                                        <button type="button" class="btn btn-success">{{ $data->status }}</button>
                                    @endif
                                    @if ($data->status == 'nonaktif')
                                        <button type="button" class="btn btn-danger">{{ $data->status }}</button>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <div class="mb-2">
                                            <div class=" btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#Updateproduct-{{ $data->id }}"><i
                                                    class="bi bi-pencil-square"></i></div>
                                        </div>


                                        <!-- Modal -->
                                        <div class="modal fade" id="Updateproduct-{{ $data->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/master/product/{{ $data->id }}" method="post"
                                                            class="container m-1 p-2">
                                                            @method('put')
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="nama_product" class="form-label">Nama
                                                                    Product</label>
                                                                <input type="hidden" class="form-control"
                                                                    id="oldNameProduct" name="oldNameProduct"
                                                                    value="{{ $data->nama_product }}">
                                                                <input type="text" class="form-control"
                                                                    id="nama_product" name="nama_product"
                                                                    value="{{ $data->nama_product }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="jenis_product" class="form-label">Jenis
                                                                    Product</label>
                                                                <input type="text" class="form-control"
                                                                    id="jenis_product" name="jenis_product"
                                                                    value="{{ $data->jenis_product }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="limit_order" class="form-label">Limit
                                                                    Order</label>
                                                                <input type="number" class="form-control"
                                                                    id="limit_order" name="limit_order"
                                                                    value="{{ $data->limit_order }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="jumlah_stock" class="form-label">jumlah
                                                                    Stock</label>
                                                                <input type="number" class="form-control"
                                                                    id="jumlah_stock" name="jumlah_stock"
                                                                    value="{{ $data->jumlah_stock }}">
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

                                        @if ($data->status == 'aktif')
                                            <form action="/master/product/{{ $data->id }}/nonaktif" method="post"
                                                class="inline-block">
                                                @method('put')
                                                @csrf
                                                <button type="submit" class="btn btn-danger inline-block"><i
                                                        class="bi bi-x-circle"></i></button>
                                            </form>
                                        @else
                                            <form action="/master/product/{{ $data->id }}/aktif" method="post">
                                                @method('put')
                                                @csrf
                                                <button type="submit" class="btn btn-success"><i
                                                        class="bi bi-check2-circle"></i></button>
                                            </form>
                                        @endif
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
