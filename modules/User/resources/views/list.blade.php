@extends('layouts.backoffice')
@section('style-imports')
<link rel="stylesheet" href="{{ asset('backoffice/plugins/datatables-bs4/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backoffice/plugins/datatables-responsive/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backoffice/plugins/datatables-buttons/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
{{-- Button add new user --}}
<div class="row mb-4">
    <div class="col-12">
        <a href="{{ route('users.create')}}" class="btn btn-primary"><i class="fa fa-user-plus"></i>  Add new user</a>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Group Permission</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($users as $user)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->group_permission }}</td>
                    <td>{{ $user->email_verified_at }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <a href="{{ route('users.create', $user->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('users.create', $user->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('users.create', $user->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Group Permission</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
        <!-- /.card -->
@endsection

{{-- Scripts --}}
@section('script-imports')
    @parent
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('backoffice/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/datatables-bs4/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/datatables-responsive/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/datatables-responsive/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/datatables-buttons/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backoffice/plugins/datatables-buttons/buttons.colVis.min.js') }}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, 
                "lengthChange": false,
                "autoWidth": false,
                "language": {
                    "lengthMenu": "Hiển thị _MENU_ bản ghi trên 1 trang",
                    "zeroRecords": "Không tìm thấy bản ghi nào",
                    "info": "Showing page _PAGE_ of _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)"
                }
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    
@endsection