@extends('pages.index')
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
                        <th>msg</th>
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
                            <td>
                                @php
                                    $array = json_decode($order->pesan, true);
                                @endphp
                                <!-- Button trigger modal -->
                                <button type="button"
                                    class="badge @if ($order->status == 'terima') bg-success @else bg-secondary @endif border-0"
                                    data-bs-toggle="modal" data-bs-target="#pesan-modal-{{ $order->id }}">
                                    <i class="bi bi-envelope"></i>
                                </button>

                            </td>
                        </tr>

                        <div class="modal fade" id="pesan-modal-{{ $order->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Pesan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">pengubah : {{ $array['nama_perubah'] }}</li>
                                            <li class="list-group-item">pengorder : {{ $array['pengorder'] }}</li>
                                            <li class="list-group-item mt-5">pesan :
                                                <p>{{ $array['msg'] }}</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary mx-auto"
                                            data-bs-dismiss="modal">Close</button>
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
