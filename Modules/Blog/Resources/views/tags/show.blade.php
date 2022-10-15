@extends('layouts.app')

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
            <!-- Default box -->
            <div class="card">
                <div class="card-body">
                    <h1>{{$tag->name}}</h1>
                    <div id="editor">
                        {!! $tag->description !!}
                    </div>
                    <div id="color">
                        {{ $tag->color }}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <!-- /.card -->
@endsection

@section('script')

@endsection
