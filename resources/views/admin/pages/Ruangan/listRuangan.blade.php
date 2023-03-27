@extends('admin.index')

@section('container')
<div class="mb-2">
<a href="{{route('ruangan.create')}}" class="btn btn-primary">Create Ruangan</a>
</div>
<table id="example" class="table table-striped mt-2" style="width:100%">
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
                <a href="/ruangan/{{ $ruangan->id }}/edit" class="badge bg-info text-transform-none">
                    edit</a> |
                @if ($ruangan->status == 'aktif' )
                    <form action="/ruangan/{{ $ruangan->id }}/nonaktif" method="post" class="inline-block">
                        @method('put')
                        @csrf
                        <button type="submit" class="badge bg-danger inline-block">nonaktifkan</button>
                    </form>
                @else
                    <form action="/ruangan/{{ $ruangan->id }}/aktif" method="post">
                        @method('put')
                        @csrf
                        <button type="submit" class="badge bg-success">aktifkan</button>
                    </form>
                @endif
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