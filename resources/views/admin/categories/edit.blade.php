@extends('admin.layouts.main')
@section('title', 'Edit category: "'.$category->name.'"')
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
                    <h3 class="card-title">Edit category: "{{$category->name}}"</h3>
                </div>
                <form action="{{route('updateCategory', $category)}}" method="post" enctype="multipart/form-data"
                      class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control box1" id="name" name="name"
                                           value="{{$category->name}}"
                                           placeholder="Enter name category" required>
                                    <div class="invalid-feedback">
                                        Please enter a category name.
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-select form-control" name="hidden" required>
                                            <option selected value="{{$category->hidden}}">{{empty($category->hidden) ? 'Not public' : 'Public'}}</option>
                                            <option value="1">Public</option>
                                            <option value="0">Not public</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid hidden.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Parent category</label>
                                    <select class="form-control form-select" name="parent_id">
                                        <option>Select the parent category</option>
                                        @foreach($categories as $item)
                                            <option value="{{$item->id}}" {{$item->id===$category->parent_id?'selected':''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="path">Transliteration</label>
                                    <input type="text" class="form-control box2" id="path" name="path"
                                           value="{{$category->path}}"
                                           placeholder="Enter transliteration category" required>
                                    <div class="invalid-feedback">
                                        Please enter a transliteration name.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('showCategories')}}" class="btn btn-danger">Don't change</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function () {

            function onchange() {
                var box1 = $('#name');
                var box2 = $('#path');
                box2.val(box1.val());
            }

            $('#name').on('change', onchange);
        });
    </script>
@endsection
