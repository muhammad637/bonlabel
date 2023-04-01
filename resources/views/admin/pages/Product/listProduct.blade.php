@extends('admin.index')
@section('pagetitle')
    <li class="breadcrumb-item fs-6">Master</li>
    <li class="breadcrumb-item color-primary fs-6 fw-bold">User</li>
@endsection
@section('container')
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Datatables</h5>
                    <p>Add lightweight datatables to your project with using the <a
                            href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple
                            DataTables</a> library. Just add <code>.datatable</code> class name to any table you
                        wish to conver to a datatable</p>
                    <a href="{{ route('product.create') }}">
                        <button type="button" class="btn btn-primary">Create Product</button>
                    </a>
                    <br>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
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
                                            <button type="button"
                                                class="btn btn-success">{{ $data->status }}</button>
                                        @endif
                                        @if ($data->status == 'nonaktif')
                                            <button type="button"
                                                class="btn btn-danger">{{ $data->status }}</button>
                                        @endif
                                    </td>
                                    <td><button type="button" href="master/product/{{ $data->id }}/edit"
                                            class="btn btn-primary">
                                            Edit</button>
                                        @if ($data->status == 'aktif')
                                            <form action="master/product/{{ $data->id }}/nonaktif"
                                                method="post" class="inline-block">
                                                @method('put')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Nonaktifkan</button>
                                            </form>
                                        @else
                                            <form action="master/product/{{ $data->id }}/aktif" method="post">
                                                @method('put')
                                                @csrf
                                                <button type="submit" class="btn btn-success">Aktifkan</button>
                                            </form>
                                        @endif
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

