@extends('pages.index')
@section('pagetitle')
    <li class="breadcrumb-item active fs-6">Orderan</li>
@endsection
@section('container')
    <div class="" style="width: 98%">
            <h2 class="text-capitalize color-black mb-3">list Order</h2>
        <!-- End Page Title -->
        <div class="table-responsive">
            <table class="table border table-striped my-2" id="example" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama User</th>
                        <th>Nama Produk</th>
                        <th>Nama Ruangan</th>
                        <th>No Telp User</th>
                        <th>No Telp Ruangan</th>
                        <th>status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    @php
                    $nohp = $order->user->no_telephone;
                    if (substr(trim($nohp), 0, 1) == '0') {
                        $nohp = '62' . substr(trim($nohp), 1);
                    }
                @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->user->nama }}</td>
                            <td>{{ $order->product->nama_product }}</td>
                            <td>{{ $order->ruangan->nama_ruangan }}</td>
                            <td><a href="https://wa.me/{{ $nohp }}" target="_blank"
                                        class="badge bg-info p-2">{{ $order->user->no_telephone }}</a>
                                </td>
                            <td>{{ $order->ruangan->no_telephone }}</td>
                            <td>
                                @if ($order->status == 'terima')
                                    <div class="badge bg-success">{{ $order->status }}</div>
                                @elseif($order->status == 'tolak')
                                    <div class="badge bg-danger">{{ $order->status }}</div>
                                @else
                                    <div class="badge bg-warning">Pending</div>
                                @endif
                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#Update-{{ $order->id }}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Modal Update-->
                        <div class="modal fade" id="Update-{{ $order->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Update</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Browser Default Validation -->
                                        <form action="/orderan/{{ $order->id }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="text" class="form-control" id="validationDefault01"
                                                value="{{ $order->id }}" name="order_id" hidden>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="validationDefault01" class="form-label">Nama User</label>
                                                    <input type="text" class="form-control" id="validationDefault01" disabled
                                                        value="{{ $order->user->nama }}" required>
    
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationDefault02" class="form-label">Nama Ruangan</label>
                                                    <input type="text" class="form-control" id="validationDefault02" disabled
                                                        value="{{ $order->ruangan_id }}" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationDefault04" class="form-label">Nama Kertas
                                                        Produk</label>
                                                    <select class="form-select" id="validationDefault04" required
                                                        name="product_id">
                                                        <option selected value="{{ $order->product_id }}">
                                                            {{ $order->product->nama_product }}</option>
                                                        @foreach ($products as $prod)
                                                            @if ($prod->id !== $order->product_id)
                                                                <option value="{{ $prod->id }}">{{ $prod->nama_product }}|<p value ="{{ $prod->id}}">{{ $prod->jenis_product}}</p>
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-2 align-items-center">
                                                <div class="col-md-6">
                                                    <label for="validationDefault03" class="form-label">Jumlah Produk</label>
                                                    <input type="number" min="1" class="form-control"
                                                        id="validationDefault04" value="{{ $order->jumlah_order }}" required
                                                        name="jumlah_order">
                                                </div>
                                                <div class="col-md-12 text-align-center">
                                                    <h6 class="my-2 fs-6 fw-bold">Konfirmasi : </h6>
                                                    <div class="row mt-2">
                                                        <div class="col-2 ms-1">
                                                            <input class="tolak" type="radio" name="status"
                                                                id="tolak-{{ $order->id }}" hidden value="tolak">
                                                            <label class="form-check-label" for="tolak-{{ $order->id }}">
                                                                <h3>
                                                                    <div class="badge bg-danger"><i class="bi bi-x-circle"></i>
                                                                        tolak </div>
                                                                </h3>
                                                            </label>
                                                        </div>
                                                        <div class="col-5">
                                                            <input class="terima" type="radio" name="status"
                                                                id="terima-{{ $order->id }}" checked hidden value="terima">
                                                            <label class="form-check-label" for="terima-{{ $order->id }}">
                                                                <h3>
                                                                    <div class="badge bg-success "><i
                                                                            class="bi bi-check2-circle"></i> terima </div>
                                                                </h3>
                                                            </label>
                                                        </div>
                                                    </div>
    
    
                                                </div>
                                                <!-- End Browser Default Validation -->
                                                <div class="modal-footer mt-5 justify-content-center">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
