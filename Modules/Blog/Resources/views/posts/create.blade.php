@extends('layouts.app')
@section('css')
    <style>
        .ck-editor__editable_inline {
            min-height: 500px;
        }
    </style>
@endsection

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Blank Page</li>
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <livewire:blog::post.create-form/>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
@endsection
@section('script')

@endsection
