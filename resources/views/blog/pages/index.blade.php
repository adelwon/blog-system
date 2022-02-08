@extends('blog.layouts.main')
@section('content')
    <main class="page-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <section class="page-header">
                        <h1>Blog System -<br><small class="text-muted">a place where you can publish your posts.</small>
                        </h1>
                    </section>
                    <section class="foi-page-section pt-0">
                        <div class="row">
                            @foreach($posts as $post)
                                <div class="col-md-6">
                                    <article class="blog-post media">
                                        <div class="blog-post-thumbnail-wrapper">
                                            <img src="{{ asset('/storage/'.$post->image) }}" alt="blog" width="155px"
                                                 class="blog-post-thumbnail mr-md-3">
                                            <span class="blog-post-badge">{{ $post->category->name }}</span>
                                        </div>
                                        <div class="media-body">
                                            <p class="blog-post-date">{{ $post->create_at }}</p>
                                            <h5 class="blog-post-title">{{ $post->title }}</h5>
                                            <p class="blog-post-excerpt">{{ $post->short_description }}</p>
                                            <a href="{{ route('singlePost',  $post->path) }}" class="text-primary">Continue
                                                reading</a>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="text-center">
                                    {{ $posts->links() }}
                                </p>
                            </div>
                        </div>
                        <section class="related-posts-section pt-4">
                            <h4 class="related-posts-section-title pb-4">Popular tags</h4>
                            @foreach($tags as $tag)
                                <a href="{{ route('showTag', $tag) }}" role="button" class="btn btn-sm">#{{ $tag->name }}</a>
                            @endforeach
                        </section>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
