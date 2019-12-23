@extends('adminlte::page')

@section('title', 'Academy')

@section('content_header')
    <h1>Main</h1>
@endsection

@section('content')

    <p>Welcome to this beautiful admin panel.</p>
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">All Pages</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <a href="{{route('users.index')}}" class="btn btn-success col-md-12 margin-bottom">users</a>
                    <a href="{{route('categories.index')}}" class="btn btn-warning col-md-12 margin-bottom">categories</a>
                    <a href="{{route('types.index')}}" class="btn btn-info col-md-12 margin-bottom">types</a>
                    <a href="{{route('contactus.index')}}" class="btn btn-danger col-md-12 margin-bottom">contacts</a>
                    <a href="{{route('semesters.index')}}" class="btn btn-primary col-md-12 margin-bottom">semesters</a>
                    <a href="{{route('posts.index')}}" class="btn btn-success col-md-12 margin-bottom">posts</a>
                </div>
            </div>
        </div>
        <!-- /.box-body -->

    </div>
    <!-- /.box -->
@endsection
