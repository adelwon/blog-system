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
        <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('storeCategory')}}" method="post" enctype="multipart/form-data"
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
                                    <option value="{{$category['id']}}">{{$category['name']}}</option>
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
                                Please select a valid hidden.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="path">Transliteration</label>
                            <input type="text" class="form-control box2" id="path" name="path"
                                   placeholder="Enter transliteration category" required>
                            <div class="invalid-feedback">
                                Please enter a transliteration name.
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <!-- /form -->
            </div>
            <!-- /.card -->
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
