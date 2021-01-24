@extends('admin.layout.template')
@section('content')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="panel panel-default">
    <div class="panel-heading">Profile</div>
    <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Primary Phone</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        </div>
    </div>
    @section('scripts')
  
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 
<script type="text/javascript">
    $(function () {

        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.employees.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'first_name', name: 'first_name'},
                {data: 'middle_name', name: 'middle_name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'email', name: 'email'},
                {data: 'last_name', name: 'primary_phone'},
                {data: 'role', name: 'role'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

    });
</script>
@endsection
</div>
</div>

@endsection