@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Blank Page</li>
@endsection

@section('content')

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- /.col -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Posts</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" placeholder="Search Mail">
                                    <div class="input-group-append">
                                        <div class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive blog-posts">
                                <table class="table table-hover table-striped p-0 m-0">
                                    <tbody>
                                    @forelse($posts as $post)
                                    <tr>
                                        <td class="blog-name">
                                            <img src="{{ $post->thumbnail }}" class="img-size-64"/>
                                        </td>
                                        <td class="blog-name">
                                            <a href="#">
                                                {{ $post->name }}
                                            </a>
                                        </td>
                                        <td class="blog-content">
                                            {{ $post->content }}
                                        </td>
                                        <td class="blog-created-at">
                                            {{ $post->created_at }}
                                        </td>
                                        <td class="blog-actions">
                                            <button class="btn btn-outline-primary btn-sm">
                                                Ver
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                        <div class="p-5">
                                            <p class="text-center">
                                                Por el momento no cuenta con ninguna entrada.
                                            </p>
                                        </div>
                                    @endforelse

                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                            <div class="float-left p-0 mt-3 mx-3">
                                {{ $posts->links() }}
                            </div>
                            <div class="float-right p-0 mt-3 mx-3">
                                <a class="btn btn-outline-success" href="{{route('posts.create')}}">
                                    {{ __('Nueva Entrada') }}
                                </a>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        {{--<div class="card-footer"></div>--}}
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
@endsection
