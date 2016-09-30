<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">@if(isset($admin->id)) @lang('core.edit')@else @lang('core.add') @endif @lang('core.user') </h4>
</div>
{!!  Form::open(['url' => '','class'=>'form-horizontal' ,'autocomplete'=>'off','id'=>'admin-edit-form']) 	 !!}
<div class="modal-body">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">@lang('core.name')</label>

            <div class="col-sm-10">
                <input type="text" name="name" class="form-control"  placeholder="@lang('core.name')" value="{{$admin->name or ''}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">@lang('core.email')</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" placeholder="@lang('core.email')" value="{{$admin->email or ''}}">
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" placeholder="@lang('core.password')">
                @if(isset($admin->id))
                    <div class="help-block">@lang('messages.leaveBlankPassword')</div>
                @endif
            </div>
        </div>

    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-success" onclick="UpdateAdmin({{$admin->id or ''}});return false">Submit</button>
    <button class="btn default" data-dismiss="modal" aria-hidden="true">Close</button>
</div>
{{Form::close()}}