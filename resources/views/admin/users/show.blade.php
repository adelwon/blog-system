@extends('admin.layouts.main')
@section('title', 'User: ' . $user->name)
@section('content')
    <section class="content">
        <div class="col-12 pt-4">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h6><strong>Full name: </strong>{{ $user->name }}</h6>
                    <h6><strong>E-mail: </strong>{{ $user->email }}</h6>
                    <h6><strong>Role: </strong>{{ $user->role }}</h6>
                </div>
                <div class="card-footer">
                    <form method="post" action="{{ route('destroyUser', $user) }}">
                        <a href="{{ route('editUser', $user) }}" class="btn btn-primary">
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
