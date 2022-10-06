@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Blank Page</li>
@endsection

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            <img src="{{ asset('storage/'.$post->thumbnail) }}" class="img-fluid"/>
            <h1>{{$post->title}}</h1>
            <div id="editor">
                {!! $post->content !!}
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- /.card -->
@endsection

@section('script')

@endsection
