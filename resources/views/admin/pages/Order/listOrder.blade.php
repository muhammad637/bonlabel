@extends('admin.index')

@section('container')
    <div class="pagetitle">
        <h1 class="mb-2 fs-2">Welcome to Admin </h1>
        <nav class="shadow-sm bg-body rounded pt-2 px-2 " style="width: 98%;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-5"><a href="/dashboardAdmin">Home</a></li>
                <li class="breadcrumb-item active fs-5">Orderan</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <div class="mb-3">

    </div>
    <table id="dataTable" class="table table-striped" style="width:100%">
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
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->user->nama }}</td>
                    <td>{{ $order->product->nama_product }}</td>
                    <td>{{ $order->ruangan->nama_ruangan }}</td>
                    <td>{{ $order->user->no_telephone }}</td>
                    <td>{{ $order->ruangan->no_telephone }}</td>
                    <td>
                        @if ($order->status == 'terima')
                            <div class="badge bg-success">{{ $order->status }}</div>
                        @elseif($order->status == 'tolak')
                            <div class="badge bg-danger">{{ $order->status }}</div>
                        @else
                            <div class="badge bg-warning">Pending</div>
                        @endif
                        {{ $order->status }}
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#Update-{{ $order->id }}">
                            Update
                        </button>
                    </td>
                </tr>

                <!-- Modal Update-->
                <div class="modal fade" id="Update-{{ $order->id }}" tabindex="-1"
                    aria-labelledby="Update-{{ $order->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="Update-{{ $order->id }}">Update Order</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               ini order ke {{$order->id}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
@endsection
