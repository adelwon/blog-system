<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('blog') }}">Home</a>
    </li>
    @foreach($categories as $category)
        @if(count($category->children) > 0)
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" id="pagesMenu" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">{{ $category->name }}</a>
                <div class="dropdown-menu" aria-labelledby="pagesMenu">
                    @foreach($category->children as $children)
                        <a class="dropdown-item" href="{{route('showCategory', $children->path)}}">{{ $children->name }}</a>
                    @endforeach
                </div>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('showCategory', $category->path)}}">{{ $category->name }}</a>
            </li>
        @endif
    @endforeach
</ul>
