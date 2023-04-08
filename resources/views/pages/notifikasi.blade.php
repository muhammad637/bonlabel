@extends('pages.index')
@section('pagetitle')
    <li class="breadcrumb-item active fs-6">notifikasi</li>
@endsection
@section('container')
    <div class="card info-card sales-card shadow" style="width: 98%">
        <div class="container my-4 font-poppins">
            <div class="d-lg-flex align-items-center mb-2 justify-content-between">
                <h5 class="fs-1 fw-semibold my-2">Semua Notifikasi</h5>
                @if (count($notifikasis) > 0)
                <a href="/notifikasi/delete" class="btn btn-danger"><i class="bi bi-trash"></i> delete All</a>
                @endif
            </div>
            @if ((count($notifikasis) > 0))
            @foreach ($notifikasis as $notif)
                <div class="alert {{ $notif->status == 'berhasil' ? 'alert-success' : 'alert-danger' }} alert-dismissible fade show"
                    role="alert">
                    <i
                        class="bi {{ $notif->nama_table == 'user' ? 'bi-people' : ($notif->nama_table == 'produk' ? 'bi-tag' : ($notif->nama_table == 'ruangan' ? 'bi-house' : 'bi-cart')) }}"></i>
                    {{ $notif->msg }}
                    <i
                        class="bi {{ $notif->jenis_notifikasi == 'tambah' ? 'bi-add-circle' : ($notif->jenis_notifikasi == 'update' ? 'bi-subtract' : ($notif->jenis_notifikasi == 'aktif' ? 'bi-check-circle' : 'bi-x-circle')) }}"></i>
                    <form action="/notifikasi/{{ $notif->id }}" method="post">
                        @method('delete')
                        @csrf 
                        <button type="submit" class="btn-close" aria-label="Close"></button>
                    </form>
                </div>
            @endforeach
            @else
                <h3 class="fs-2 font-poppins text-secondary text-center my-5">Notifikasi Kosong</h3>
            @endif  
        </div>

    </div>
@endsection
