@extends('admin.layouts.main')
@section('title', 'Users')
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
            <h1 class="m-0">Users</h1>
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
                                    <th>Full name</th>
                                    <th>E-mail</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>Author</td>
                                        <td>
                                            <div class="btn-group">
                                                <form method="post" action="{{route('destroyUser', $user)}}">
                                                    <a href="{{route('showUser', $user)}}" class="btn btn-default">
                                                        <i class="far fa-eye"></i></a>
                                                    <a href="{{route('editUser', $user)}}" class="btn btn-default">
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
                            {{$users->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
