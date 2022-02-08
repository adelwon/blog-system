@extends('admin.layouts.main')
@section('title', 'Create user')
@section('content')
    <section class="content">
        <div class="col-12 pt-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create user</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('storeUser') }}" method="post" enctype="multipart/form-data"
                          class="needs-validation" novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="name">Full name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                   placeholder="Enter a full name" required>
                            <div class="invalid-feedback">
                                Please enter a full name.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="you@example.com" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-select form-control" name="role" required>
                                <option value="" selected>Choose a password for the user</option>
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}">{{ $role }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select a role.
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

