@extends('admin.layouts.main')
@section('title', 'Edit tag: "'.$tag->name.'"')
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
                    <h3 class="card-title">Edit tag: "{{$tag->name}}"</h3>
                </div>
                <form action="{{route('updateTag', $tag)}}" method="post" enctype="multipart/form-data"
                      class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control box1" id="name" name="name"
                                           value="{{$tag->name}}"
                                           placeholder="Enter name category" required>
                                    <div class="invalid-feedback">
                                        Please enter a tag name.
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-select form-control" name="hidden">
                                            <option selected value="{{$tag->hidden === false ? 0 : 1}}">{{$tag->hidden === true ? 'public' : 'not public'}}</option>
                                            <option value="1">public</option>
                                            <option value="0">not public</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid hidden.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('showTags')}}" class="btn btn-danger">Don't change</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
