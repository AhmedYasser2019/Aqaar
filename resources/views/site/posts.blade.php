@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   @lang('models/posts.plural')
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">


        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                <form method="get" action="{{route('site')}}">
                    <div class="form-group row">
                        <label for="text" class="col-sm-2 col-form-label">search</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{request()->get('text')}}" name="text" class="form-control" id="text" placeholder="search">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table" id="posts-table">
                        <thead>
                        <tr>
                            <th colspan="3">@lang('models/posts.fields.title')</th>
                            <th colspan="3">@lang('models/posts.fields.description')</th>
                            <th colspan="3">@lang('models/posts.fields.category')</th>
                            <th colspan="3">@lang('crud.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td colspan="3">
                                    {{$post->title}}
                                </td>
                                <td colspan="3">
                                    {{$post->description}}
                                </td>
                                <td colspan="3">
                                    {{$post->category->name ?? ''}}
                                </td>

                                <td width="120">
                                    <div class='btn-group'>
                                        <a href="{{ route('posts.show', [$post->id]) }}"
                                           class='btn btn-default btn-xs'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                       </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination-wrapper">
                    {{ $posts->links() }}
                </div>
                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


