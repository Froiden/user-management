<script src="{{ theme_url('plugins/jQuery/jQuery-2.2.0.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ theme_url('bootstrap/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ theme_url('plugins/fastclick/fastclick.js') }}"></script>
{{--Pace--}}
<script src="{{theme_url('plugins/pace/pace.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{ theme_url('js/app.min.js') }}"></script>

<script src="{{ theme_url('plugins/froiden-helper/helper.js')}}"></script>
<script src="{{ theme_url('plugins/iCheck/icheck.min.js')}}"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function editAdminModal(id) {
        var url  ="{{route('profile.edit',':id')}}"
        url      = url.replace(':id',id);
        $.ajaxModal('#AdminEditModal',url);
    }

    function UpdateAdmin(id) {

            var url  ="{{route('profile.update',':id')}}"
            url      = url.replace(':id',id);

        $.easyAjax({
            type: 'PUT',
            url: url,
            data: $('#admin-edit-form').serialize(),
            container: "#admin-edit-form",
            success: function(response) {
                if (response.status == "success") {
                    $('#AdminEditModal').modal('hide');

                }
            }
        });
    }

</script>
@yield('footerjs')