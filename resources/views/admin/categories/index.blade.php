@extends('admin.layouts.main')
@section('title', 'Categories')
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
            <h1 class="m-0">Categories</h1>
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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Parent ID</th>
                                <th>Public</th>
                                <th>Path</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->parent_id }}</td>
                                    <td>{!! $category->hidden === true ? '<span class="badge bg-success">published</span>' : '<span class="badge bg-danger">no published</span>'!!}</td>
                                    <td>{{ $category->path }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <form method="post" action="{{ route('destroyCategory', $category) }}">
                                                <a href="{{ route('editCategory', $category) }}" class="btn btn-default">
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
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
