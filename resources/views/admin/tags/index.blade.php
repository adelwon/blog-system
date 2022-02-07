@extends('admin.layouts.main')
@section('title', 'Tags')
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
            <h1 class="m-0">Tags</h1>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap mb-2">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Public</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tag['name'] }}</td>
                                    <td>{!! $tag->hidden === true ? '<span class="badge bg-success">published</span>' : '<span class="badge bg-danger">no published</span>'!!}</td>
                                    <td class="text-end">
                                        <div class="btn-group">
                                            <form method="post" action="{{ route('destroyTag', $tag) }}">
                                                <a href="{{ route('editTag', $tag) }}" class="btn btn-default">
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
                        {{ $tags->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
