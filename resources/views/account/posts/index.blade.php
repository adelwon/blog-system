@extends('account.layouts.main')
@section('title', 'Posts')
@section('content')
    @if(session()->get('success'))
        <div class="alert alert-success m-2">
            {{ session()->get('success') }}
        </div>
    @endif
    @if(session()->get('danger'))
        <div class="alert alert-danger m-2">
            {{ session()->get('danger') }}
        </div>
    @endif
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Posts</h1>
        </div>
    </div>
    <section class="content">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap mb-2">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Public</th>
                                    <th>Tags</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{!! $post->hidden === true ? '<span class="badge bg-success">published</span>' : '<span class="badge bg-danger">no published</span>'!!}</td>
                                        <td>@foreach($tags as $tag)
                                                @if(is_array( $post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()))
                                                    <span class="badge bg-info">#{{ $tag->name }}</span>
                                                @endif
                                            @endforeach</td>
                                        <td>
                                            <div class="btn-group">
                                                <form method="post" action="{{route('destroyUserPost', $post)}}">
                                                    <a href="{{ route('showUserPost', $post->path) }}" class="btn btn-default">
                                                        <i class="far fa-eye"></i></a>
                                                    <a href="{{ route('editUserPost', $post) }}" class="btn btn-default">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
