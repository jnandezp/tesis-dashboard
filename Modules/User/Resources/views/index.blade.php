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
                    <div class="my-4">
                        {!! QrCode::encoding('UTF-8')->size(100)->generate(Request::url()); !!}
                    </div>
                    <div class="my-4">
                        {!! DNS1D::getBarcodeSVG('4445645656', 'C39'); !!}
                    </div>
                    <p>
                        PERFIL {{ $user->fullName }}
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <!-- /.card -->
@endsection

@section('script')

@endsection
