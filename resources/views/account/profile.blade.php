@extends('account.layouts.main')
@section('title', 'Dashboard')
@section('content')
    <section class="content">
        <div class="col-12 pt-4">
            <div class="card card-primary card-outline bg-light">
                <div class="card-header">
                    <div class="row pt-4">
                        <div class="col-8">
                            <h6><strong>Name: </strong>{{$user->name}}</h6>
                            <h6><strong>E-mail: </strong>{{$user->email}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
