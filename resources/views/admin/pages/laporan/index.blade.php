@extends('admin.index')
@section('pagetitle')
<li class="breadcrumb-item active fs-6">Laporan</li>
@endsection

@section('container')
@section('container')
    <!-- End Page Title -->
    <div class="mb-3">

    </div>
    <table id="example" class="table table-striped" style="width:100%">
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
@endsection

@endsection