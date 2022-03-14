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
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-user-lock"></i> Ban
                        </button>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ban the user for a while</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Date and time -->
                    <div class="form-group">
                        <form action="{{ route('updateUser', $user) }}" method="post" enctype="multipart/form-data"
                              class="needs-validation" novalidate>
                        <label>Ban to:</label>
                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                            <input type="text" name="blocked_date" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                            <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
</script>
@endsection
