@extends('admin.layouts.main')
@section('title', 'Create post')
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
                    <h3 class="card-title">Create post</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('storePost')}}" method="post" enctype="multipart/form-data"
                          class="needs-validation" novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                   placeholder="Enter a title" required>
                            <div class="invalid-feedback">
                                Please enter a title for the post.
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="path" name="path"
                                       placeholder="Enter URL slug for post"
                                       required>
                                <button class="btn btn-warning" type="button" onClick="myFunction()">Convert
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="short_description">Short description</label>
                            <input type="text" class="form-control" name="short_description" id="short_description"
                                   placeholder="Enter a short description" required>
                            <div class="invalid-feedback">
                                Please enter a short description for the post.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="text">Textarea</label>
                            <textarea name="text" id="summernote" required></textarea>
                            <div class="invalid-feedback">
                                Please enter a description for the post.
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select class="form-select form-control" name="category_id" required>
                                        <option selected disabled value="">Choose a category for your post</option>
                                        @foreach($categories as $category)
                                            @if($category['hidden'] === true)
                                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please enter a category for the post.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tags[]">Tags</label>
                                    <select class="select2" name="tags[]" multiple="multiple"
                                            data-placeholder="Select tags"
                                            style="width: 100%;" required>
                                        @foreach($tags as $tag)
                                            @if($tag['hidden'] === true)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select tags.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hidden">Status</label>
                            <select class="form-select form-control" name="hidden" required>
                                <option selected disabled value="">Public category?</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a post status.
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image"
                                       accept=".jpg, .jpeg, .png"
                                       id="image" required>
                                <label class="custom-file-label" for="image">Choose a photo</label>
                                <div class="invalid-feedback">
                                    Please select a photo for the post.
                                </div>
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
@section('js')
    <script>
        function myFunction() {

            var a = document.getElementById("title").value;

            var b = a.toLowerCase().replace(/ /g, '-')
                .replace(/[^\w-]+/g, '');

            document.getElementById("path").value = b;
        }
    </script>
@endsection

