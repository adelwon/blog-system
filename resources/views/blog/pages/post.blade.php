@extends('blog.layouts.main')
@section('content')
    <main class="page-blog-post">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <section>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb foi-breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('blog')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{route('showCategory', $post->category->path)}}">{{$post->category->name}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
                            </ol>
                        </nav>
                    </section>
                    <section class="blog-post-header">
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <h1 class="blog-post-title">{{$post->title}}</h1>
                                <p class="blog-post-date">{{$post->created_at}}</p>
                            </div>
                        </div>
                    </section>
                    <section class="blog-post-content">
                        <div class="row">
                            <div class="col-12 mb-5">
                                <img src="{{asset('/storage/'.$post->image)}}" alt="blog details" class="img-fluid">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <blockquote>
                                    <p>{{$post->short_description}}</p>
                                </blockquote>
                                {!! $post->text !!}
                                <h5>This article was written by <strong class="text-muted">{{ $post->user->name }}</strong></h5>
                                @foreach($tags as $tag)
                                    @if(is_array( $post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()))
                                        <a href="{{ route('showTag', $tag) }}" role="button" class="btn text-primary btn-sm">#{{ $tag->name }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <section class="related-posts-section pt-4">
                        <h4 class="related-posts-section-title">Other posts</h4>
                        <div class="row">
                             @foreach($posts as $post)
                            <div class="col-md-4 related-post">
                                <div class="related-post-thumbnail-wrapper">
                                    <img src="{{asset('/storage/'.$post->image)}}" alt="related post">
                                    <span class="blog-post-badge">{{$post->category->name}}</span>
                                </div>
                                <p class="post-published-date">{{$post->created_at}}</p>
                                <h4 class="post-tite">{{$post->title}}</h4>
                                <a href="{{ route('singlePost',  $post->path) }}" class="text-primary">Continue
                                    reading</a>
                            </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
