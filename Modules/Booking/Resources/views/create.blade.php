@extends('layouts.app')
@section('css')

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
                <form action="#" method="POST">
                    <div class="card-header">
                        <h3 class="card-title">Nueva Entrada</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="card-body">

                        @csrf
                        <div class="form-group">
                            <label for="post-title">Titulo</label>
                            <input type="text" class="form-control" id="post-title" name="title"
                                   placeholder="Enter a title">
                        </div>
                        <div class="form-group">
                            <label for="post-content">Contenido</label>
                            <textarea class="form-control" id="post-content" name="content"
                                      placeholder="Enter a lorem"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="publish" name="publish">
                            <label class="form-check-label" for="publish">¿Deseas publicar?</label>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->

@endsection
@section('script')
@endsection
