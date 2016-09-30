<footer class="main-footer">
    <div class="pull-right hidden-xs">
        {{--<b>Version</b> 2.3.3--}}
    </div>
    <strong>Copyright &copy; {{ Carbon\Carbon::now()->format('Y') }} {{ settings('site_name') }}</strong> @lang('messages.allRightsReserved')
</footer>

<!-- Add FORM -->
<div id="AdminEditModal" class="modal fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{--Content to inserted by ajax data--}}
        </div>
    </div>
</div>