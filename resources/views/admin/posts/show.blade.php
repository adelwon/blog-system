@extends('admin.layouts.main')
@section('title', 'Post: "'.$post->title.'"')
@section('content')
    <section class="content">
        <div class="col-12 pt-4">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row pt-4">
                        <div class="col-8">
                            <h6><strong>Title: </strong>{{ $post->title }}</h6>
                            <h6><strong>Category: </strong>{{ $post->category->name }}</h6>
                            <h6><strong>Status: </strong>{{ $post->hidden === true ? 'published' : 'not published' }}
                            </h6>
                            <h6><strong>URL slug: </strong>{{ $post->path }}</h6>
                            <h6><strong>Short description: </strong>{{ $post->short_description }}</h6>
                            @foreach($tags as $tag)
                                @if(is_array( $post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()))
                                <button type="button" class="btn btn-info btn-sm">#{{ $tag->name }}</button>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-4" style="display: flex;align-content: center;justify-content: center;">
                            <img class="figure-img" height="200" src="{{ asset('/storage/'.$post->image) }}"
                                 role="img" alt="Image for post">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4">
                    {!! $post->text !!}
                </div>
                <div class="card-footer">
                    <form method="post" action="{{ route('destroyPost', $post) }}">
                        <a href="{{ route('editPost', $post) }}" class="btn btn-primary">
                            <i class="far fa-edit"></i> Edit</a>
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
                            <i class="far fa-trash-alt"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
