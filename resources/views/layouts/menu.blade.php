<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p>@lang('models/users.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('posts.index') }}"
       class="nav-link {{ Request::is('posts*') ? 'active' : '' }}">
        <p>@lang('models/posts.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('categories.index') }}"
       class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
        <p>@lang('models/categories.plural')</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('site') }}"
       class="nav-link {{ Request::is('site') ? 'active' : '' }}">
        <p>site</p>
    </a>
</li>


