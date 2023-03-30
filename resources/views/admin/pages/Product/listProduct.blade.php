@extends('admin.index')
<main id="main" class="main">
      
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Datatables</h5>
            <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>
            <a href="{{route('product.create')}}">
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
                    <td> @if ($data->status == 'aktif')
                        <button type="button" class="btn btn-success">{{ $data->status }}</button>
                    @endif
                    @if ($data->status == 'nonaktif')
                        <button type="button" class="btn btn-danger">{{ $data->status }}</button>
                    @endif</td>
                    <td><button type="button"  href="/product/{{ $data->id }}/edit" class="btn btn-primary">
                        Edit</button>
                    @if ($data->status == 'aktif' )
                        <form action="/product/{{ $data->id }}/nonaktif" method="post" class="inline-block">
                            @method('put')
                            @csrf
                            <button type="submit" class="btn btn-danger">Nonaktifkan</button>
                        </form>
                    @else
                        <form action="/product/{{ $data->id }}/aktif" method="post">
                            @method('put')
                            @csrf
                            <button type="submit" class="btn btn-success">Aktifkan</button>
                        </form>
                    @endif</td>
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
</main><!-- End #main -->
@section('container')
    {{-- <div class="container">
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
                        <p>status produk : {{ $data->status }}</p>
                        <p>aksi : <a href="/product/{{ $data->id }}/edit" class="badge bg-info text-transform-none">
                                edit</a> |
                            @if ($data->status == 'aktif' )
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
    </div> --}}
@endsection
