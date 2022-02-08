@extends('admin.layouts.main')
@section('title', 'Create tag')
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
                    <h3 class="card-title">Create tag</h3>
                </div>
                <form action="{{ route('storeTag') }}" method="post" enctype="multipart/form-data"
                      class="needs-validation" novalidate>
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control box1" id="name" name="name"
                                   placeholder="Enter name category" required>
                            <div class="invalid-feedback">
                                Please enter a tag name.
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="form-select form-control" name="hidden" required>
                                <option selected disabled value="">Public tag?</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid hidden.
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
