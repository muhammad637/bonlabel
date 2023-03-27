@extends('admin.index')

@section('container')
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Ruangan</th>
            <th>Status</th>
            <th>No Telephone</th>
            <th>Menu</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ruangans as $ruangan)
        <tr>
            <td>{{}}</td>
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