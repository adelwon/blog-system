@extends('admin.layouts.main')
@section('title', 'Create category')
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
                    <h3 class="card-title">Create category</h3>
                </div>
                <form action="{{ route('storeCategory') }}" method="post" enctype="multipart/form-data"
                      class="needs-validation" novalidate>
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control box1" id="name" name="name"
                                   placeholder="Enter name category" required>
                            <div class="invalid-feedback">
                                Please enter a category name.
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="form-control form-select" name="parent_id">
                                <option selected  value="">Select the main category</option>
                                @foreach($categories as $category)
                                    @if($category->hidden === true)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-select form-control" name="hidden" required>
                                <option selected disabled value="">Public category?</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a status for the post.
                            </div>
                        </div>
                        <div class="form-group">
                            <label>URL slug</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="path" name="path"
                                       placeholder="Enter URL slug for post"
                                       required>
                                <button class="btn btn-warning" type="button" onClick="myFunction()">Convert
                                </button>
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

@section('js')
    <script>
        function myFunction() {

            var a = document.getElementById("name").value;

            var b = a.toLowerCase().replace(/ /g, '-')
                .replace(/[^\w-]+/g, '');

            document.getElementById("path").value = b;
        }
    </script>
@endsection
