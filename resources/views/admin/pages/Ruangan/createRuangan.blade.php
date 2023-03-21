@extends('admin.index')
@section('container')
    <form action="{{ route('postUser') }}" method="post" class="container m-4 p-5">
        @csrf
            <div class="mb-3">
              <label for="namaRuangan" class="form-label">Nama Ruangan</label>
              <input type="text" class="form-control" id="namaRuangan" name="namaRuangan">
            </div>

            <div class="mb-3">
              <label for="no_telfon" class="form-label">Nama Ruangan</label>
              <input type="text" class="form-control" id="no_telfon" name="no_telfon">
            </div>

            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <input type="text" class="form-control" id="status" name="status">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection