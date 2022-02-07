@extends('account.layouts.main')
@section('title', 'Edit post: "'.$post->title.'"')
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
                    <h3 class="card-title">Edit post: "{{$post->title}}"</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('updateUserPost', $post)}}" method="post" enctype="multipart/form-data"
                          class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control box1" name="title" id="title"
                                   value="{{$post->title}}"
                                   placeholder="Enter a title" required>
                            <div class="invalid-feedback">
                                Please enter a title for the post.
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="path" name="path"
                                       value="{{$post->path}}" required>
                                <button class="btn btn-warning" type="button" onClick="myFunction()">Convert
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="short_description">Short description</label>
                            <input type="text" class="form-control" name="short_description" id="short_description"
                                   value="{{$post->short_description}}"
                                   placeholder="Enter a short description" required>
                            <div class="invalid-feedback">
                                Please enter a short description for the post.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="text">Textarea</label>
                            <textarea id="summernote" name="text" required>{{$post->text}}</textarea>
                            <div class="invalid-feedback">
                                Please enter a description for the post.
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">

                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>
                        <input type="hidden" id="hidden" name="hidden" value="{{ $post->hidden }}">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select class="form-select form-control" name="category_id" required>
                                        <option selected disabled value="">Choose a category for your post</option>
                                        @foreach($categories as $item)
                                            @if($item['hidden'] === true)
                                                <option
                                                    value="{{ $item->id }}" {{ $item->id === $post->category_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please enter a category for the post.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tags[]">Tags</label>
                                    <select class="select2" name="tags[]" multiple="multiple"
                                            data-placeholder="Select tags"
                                            style="width: 100%;">
                                        @foreach($tags as $tag)
                                            @if($tag['hidden'] === true)
                                                <option
                                                    value="{{ $tag->id }}" {{ is_array( $post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image"
                                               value="{{$post->image}}"
                                               accept=".jpg, .jpeg, .png" required>
                                        <label class="custom-file-label" for="image">Choose a photo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-auto d-none d-lg-block">
                                    <img class="figure-img" height="250" src="{{asset('/storage/'.$post->image)}}"
                                         role="img" alt="Image for post">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('showUserPosts')}}" class="btn btn-danger">Don't change</a>
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
