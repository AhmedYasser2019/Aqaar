<label class="col-sm-3 col-form-label"><span style="color: red">*</span>@lang('models/users.fields.name')</label>
<div class="col-sm-9">
    <input type="text" name="name" class="form-control"  value="{{$user->name ?? old('name')}}" placeholder="@lang('models/users.fields.name')">
</div>
<label class="col-sm-3 col-form-label"><span style="color: red">*</span>@lang('models/users.fields.email')</label>
<div class="col-sm-9">
    <input type="text" name="email" class="form-control"  value="{{$user->email ?? old('email')}}" placeholder="@lang('models/users.fields.email')">
</div>
<label class="col-sm-3 col-form-label"><span style="color: red">*</span>@lang('models/users.fields.password')</label>
<div class="col-sm-9">
    <input type="password" name="password" class="form-control"  value="" placeholder="@lang('models/users.fields.password')">
</div>
<label class="col-sm-3 col-form-label"><span style="color: red">*</span>@lang('models/users.fields.confirm_password')</label>
<div class="col-sm-9">
    <input type="password" name="password_confirmation" class="form-control"  value="" placeholder="@lang('models/users.fields.confirm_password')">
</div>
