@extends('admin.index')

@section('container')

    <div class="container">
        <a href="{{route('product.create')}}">
            <h1>create product</h1>
        </a>
        @if (count($datas) > 0)
            <ul>
                @foreach ($datas as $data)
                    <li>
                        <p> nama produk : {{ $data->nama_product }}</p>
                        <p>jenis product : {{ $data->jenis_product }}</p>
                        <p>limit order : {{ $data->limit_order }}</p>
                        <p>jumlha stock : {{ $data->jumlah_stock }}</p>
                        <p>status produk : {{ $data->status_product }}</p>
                        <p>aksi : <a href="/product/{{ $data->id }}/edit" class="badge bg-info text-transform-none">
                                edit</a> |
                            @if ($data->status_product == 'aktif' )
                                <form action="/product/{{ $data->id }}/nonaktif" method="post" class="inline-block">
                                    @method('put')
                                    @csrf
                                    <button type="submit" class="badge bg-danger inline-block">nonaktifkan</button>
                                </form>
                            @else
                                <form action="/product/{{ $data->id }}/aktif" method="post">
                                    @method('put')
                                    @csrf
                                    <button type="submit" class="badge bg-success">aktifkan</button>
                                </form>
                            @endif
                        </p>
                    </li>
                @endforeach
            </ul>
        @else
            <h1>data product kosong</h1>
        @endif
    </div>

@endsection
