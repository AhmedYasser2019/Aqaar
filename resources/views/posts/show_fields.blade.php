<div class="col-sm-12">
    {!! Form::label('title', __('models/posts.fields.title').':') !!}
    <p>{{ $post->title }}</p>
</div>
<div class="col-sm-12">
    {!! Form::label('description', __('models/posts.fields.description').':') !!}
    <p>{{ $post->description }}</p>
</div>
<div class="col-sm-12">
    {!! Form::label('category', __('models/posts.fields.category').':') !!}
    <p>{{ $post->category->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/posts.fields.created_at').':') !!}
    <p>{{ $post->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/posts.fields.updated_at').':') !!}
    <p>{{ $post->updated_at }}</p>
</div>

