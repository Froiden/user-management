@extends(settings('theme_folder').'admin.layouts.admin')
@section('style')
    <link rel="stylesheet" href="{{ theme_url('plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ theme_url('plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('page-header')
    <section class="content-header">
        <h1>
            {{$pageTitle}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('menu.home')</a></li>
            <li class="active">@lang('menu.users')</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="javascript: ;" onclick="addModal()" class="btn btn-success">
                        <span class="hidden-xs"> @lang('core.btnAddUser') </span><i class="fa fa-plus"></i>
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="users" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>@lang('core.id')</th>
                            <th>@lang('core.name')</th>
                            <th>@lang('core.email')</th>
                            <th>@lang('core.age')</th>
                            <th>@lang('core.gender')</th>
                            <th>@lang('core.created_at')</th>
                            <th>@lang('core.status')</th>
                            <th>@lang('core.actions')</th>
                        </tr>
                        </thead>
                    </table>
                </div>

                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

@endsection

@section('modals')
    <!-- Add FORM -->
    <div id="addEditModal" class="modal fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{--Content to inserted by ajax data--}}
            </div>
        </div>
    </div>

    @include(settings('theme_folder').'admin.include.delete-modal')
@endsection

@section('footerjs')
    <!-- DataTables -->
    <script src="{{ theme_url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ theme_url('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ theme_url('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript">
                {{----Datatable loading --}}
        var  table = $('#users').dataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{route('admin.get-users')}}",
                    "columns": [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'dob', name: 'dob'},
                        {data: 'gender', name: 'gender'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'status', name: 'status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ],
                    "oLanguage": {
                        "sProcessing": '<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>'
                    }
                });

//        Show Delete Modal
        function deleteAlert(id, name) {

            $('#deleteModal').modal('show');

            var confirmMsg = '{!! trans('messages.deleteConfirm', ["name" => ":name"]) !!}';
            confirmMsg = confirmMsg.replace(":name", name);

            $("#deleteModal").find('#info').html(confirmMsg);

            $('#deleteModal').find("#delete").off().click(function () {
                var url = "{{ route('admin.users.destroy',':id') }}";
                url = url.replace(':id', id);

                var token = "{{ csrf_token() }}";

                $.easyAjax({
                    type: 'DELETE',
                    url: url,
                    data: {'_token': token},
                    container: "#deleteModal",
                    success: function (response) {
                        if (response.status == "success") {
                            $('#deleteModal').modal('hide');
                            table._fnDraw();
                        }
                    }
                });

            });
        }

//        Show Add modal
        function addModal() {
            $.ajaxModal('#addEditModal','{{route('admin.users.create')}}');
        }

//        Show Edit Modal
        function editModal(id) {
            var url  ="{{route('admin.users.edit',':id')}}"
            url      = url.replace(':id',id);
            $.ajaxModal('#addEditModal',url);
        }

//        Update User Function ajax request
        function addEditUser(id) {
            if(typeof id!='undefined'){
                var url  ="{{route('admin.users.update',':id')}}"
                url      = url.replace(':id',id);
                var method = 'PUT';
            }else{
                url = "{{ route('admin.users.store') }}";
                var method = 'POST';
            }

            $.easyAjax({
                type: method,
                url: url,
                data: $('#add-edit-form').serialize(),
                container: "#add-edit-form",
                success: function(response) {
                    if (response.status == "success") {
                        $('#addEditModal').modal('hide');
                        table._fnDraw();

                    }
                }
            });
        }


    </script>
@endsection