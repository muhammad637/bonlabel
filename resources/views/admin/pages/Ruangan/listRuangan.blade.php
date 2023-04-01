@extends('admin.index')
<li class="breadcrumb-item fs-6">Master</li>
<li class="breadcrumb-item color-primary fs-6 fw-bold">Ruangan</li>
@section('container')

<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus fs-5"></i> Tambah Ruangan </button>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Tambah Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('ruangan.store')}}" method="post" class="container m-1 p-1">
                @csrf
                <div class="mb-3">
                    <label for="namaRuangan" class="form-label">Nama Ruangan</label>
                    <input type="text" class="form-control" id="namaRuangan" name="nama_ruangan">
                  </div>
            
                  <div class="mb-3">
                    <label for="no_telephone" class="form-label">No Telephone</label>
                    <input type="text" class="form-control" id="no_telephone" name="no_telephone">
                  </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>       </div>
            </form>
            
        </div>
        
      </div>
    </div>
  </div>
</div>
 <table class="table font-poppins table-striped border" id="example" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Ruangan</th>
            <th>Status</th>
            <th>No Telephone</th>
            <th>Menu</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ruangans as $ruangan)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$ruangan->nama_ruangan}}</td>
            <td>{{$ruangan->status}}</td>
            <td>{{$ruangan->no_telephone}}</td>
            <td>
                    <div class="d-flex gap-2">
                        <a href="/master/product/{{ $ruangan->id }}/edit " class="mb-2">
                        <div class=" btn btn-warning"><i class="bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></div>
                          @if ($ruangan->status == 'aktif' )
                        <form action="/ruangan/{{ $ruangan->id }}/nonaktif" method="post" class="inline-block">
                        @method('put')
                        @csrf
                        <button type="submit" class="btn btn-danger inline-block"><i
                            class="bi bi-x-circle"></i></button>
                         </form>
                         @else
                        <form action="/ruangan/{{ $ruangan->id }}/aktif" method="post">
                        @method('put')
                        @csrf
                        <button type="submit" class="btn btn-success"><i
                            class="bi bi-check2-circle"></i></button>
                        </form>
                        @endif
                    </div>
            </td>
              
        </tr>
        @endforeach
    </tbody>
    
</table>
<script src="
https://code.jquery.com/jquery-3.5.1.js
"></script>
<script src="
https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js
"></script>
<script src="
https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js

"></script>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
@endsection