@extends('admin.index')
@section('pagetitle')
    <li class="breadcrumb-item active fs-6">Laporan</li>
@endsection

@section('container')
    <!-- End Page Title -->
    <div class="font-poppins" style="width: 98%">
        <div class="d-flex mb-3 justify-content-between align-items-end">
            <div class="fs-2 color-black">
                List Laporan
            </div>
            <div class="d-flex justify-content-end gap-2">
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-download"></i> Excel
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/eksportLaporan">Semua</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#bulanan">Bulanan</a></li>
                    </ul>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="bulanan" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Eksport Laporan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="/bulananExcel" method="post">
                                @csrf
                                <div class="modal-body">
                                    <label for="bulanan" class="form-label"> Pilih bulan</label>
                                    <input type="month" id="bulanan" name="bulanan" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="table-responsive">
            <table id="example" class="table table-striped border" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama User</th>
                        <th>Nama Produk</th>
                        <th>Nama Ruangan</th>
                        <th>jumlah_order</th>
                        <th>No Telp Ruangan</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->user->nama }}</td>
                            <td>{{ $order->product->nama_product }}</td>
                            <td>{{ $order->ruangan->nama_ruangan }}</td>
                            <td>{{ $order->jumlah_order }}</td>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
