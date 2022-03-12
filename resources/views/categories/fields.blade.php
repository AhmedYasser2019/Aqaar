<label class="col-sm-3 col-form-label"><span style="color: red">*</span>@lang('models/categories.fields.name')</label>
<div class="col-sm-9">
    <input type="text" name="name" class="form-control"  value="{{$category->name ?? ''}}" placeholder="@lang('models/categories.fields.name')">
</div>
