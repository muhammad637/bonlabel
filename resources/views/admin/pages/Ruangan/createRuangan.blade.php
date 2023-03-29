@extends('admin.index')
@section('container')
    <form action="{{ route('ruangan.store') }}" method="post" class="container m-4 p-5">
        @csrf
            <div class="mb-3">
              <label for="namaRuangan" class="form-label">Nama Ruangan</label>
              <input type="text" class="form-control" id="namaRuangan" name="nama_ruangan">
            </div>
            <div class="mb-3">
              <label for="no_telephone" class="form-label">No Telephone</label>
              <input type="text" class="form-control" id="no_telephone" name="no_telephone">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            	
    </form>
@endsection