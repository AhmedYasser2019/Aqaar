<label class="col-sm-3 col-form-label"><span style="color: red">*</span>@lang('models/posts.fields.category')</label>
<div class="col-sm-9">
    {{ Form::select('category_id', $categories, $post->category_id ?? '', ['class'=>'form-control select2']) }}

</div>
<label class="col-sm-3 col-form-label"><span style="color: red">*</span>@lang('models/posts.fields.title')</label>
<div class="col-sm-9">
    <input type="text" name="title" class="form-control" value="{{$post->title ?? ''}}"
           placeholder="@lang('models/posts.fields.title')">

</div>
<label class="col-sm-3 col-form-label"><span style="color: red">*</span>@lang('models/posts.fields.description')</label>
<div class="col-sm-9">
    <input type="text" name="description" class="form-control" value="{{$post->description ?? ''}}"
           placeholder="@lang('models/posts.fields.description')">

</div>

<label class="col-sm-3 col-form-label"><span style="color: red">*</span>@lang('models/posts.fields.date')</label>
<div class="col-sm-9">
    <input type="date" name="date" class="form-control" value="{{$post->date ?? ''}}"
           placeholder="@lang('models/posts.fields.date')">

</div>
<label class="col-sm-3 col-form-label"><span style="color: red">*</span>@lang('models/posts.fields.image')</label>
<div class="col-sm-9">
    {{ Form::file('image',['class'=>'form-control','id'=>'image']) }}

</div>

@if(isset($post) && $post->image)
<label class="col-sm-3 col-form-label"> </label>
<div class="col-sm-9">
    <img src="{{URL::to($post->image ?? '')}}" class="img-thumbnail">


</div>

@endif
