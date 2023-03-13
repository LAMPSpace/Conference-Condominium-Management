@extends('layouts.backoffice')
@section('style-imports')
<link rel="stylesheet" href="{{ asset('backoffice/plugins/datatables-bs4/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backoffice/plugins/datatables-responsive/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backoffice/plugins/datatables-buttons/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
{{-- Button add new user --}}
<div class="row mb-3">
    <div class="col-12">
        <a href="{{ route('users.create')}}" class="btn btn-primary"><i class="fa fa-user-plus"></i>  {{ __("User::translates.create_title")}}</a>
    </div>
</div>
@if(session()->has('msg'))
    <x-alert type="success" title="Success" :message="session()->get('msg')" />
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __("User::translates.list_table_title") }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="user_table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>{{ __("User::translates.table.id") }}</th>
                    <th>{{ __("User::translates.table.fullname") }}</th>
                    <th>{{ __("User::translates.table.username") }}</th>
                    <th>{{ __("User::translates.table.email") }}</th>
                    <th>{{ __("User::translates.table.group") }}</th>
                    <th>{{ __("User::translates.table.status") }}</th>
                    <th>{{ __("User::translates.table.created_at") }}</th>
                    <th>{{ __("User::translates.table.updated_at") }}</th>
                    <th>{{ __("User::translates.table.actions") }}</th>
                </tr>
            </thead>
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
            $("#user_table").DataTable({
                "responsive": true, 
                "processing": true,
                "autoWidth": false,
                "serverSide": true,
                "ajax": "{{ route('users.api.datatables') }}",
                "language": {
                    "lengthMenu": "Hiển thị _MENU_ bản ghi trên 1 trang",
                    "zeroRecords": "Không tìm thấy bản ghi nào",
                    "info": "Đang hiển thị trang _PAGE_ trên _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Tìm kiếm:",
                    "paginate": {
                        "first":      "Đầu",
                        "last":       "Cuối",
                        "next":       "Trang sau",
                        "previous":   "Trang trước"
                    },
                },
                "columns": [
                    {
                        "data": "id",
                        "render": function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        "searchable": false,
                    },
                    { "data": "fullname" },
                    { "data": "username" },
                    { "data": "email" },
                    { "data": "group_id" },
                    { "data": "email_verified_at" },
                    { "data": "created_at" },
                    { "data": "updated_at" },
                    { "data": "action" },
                ],
            });
        });
    </script>
    
@endsection