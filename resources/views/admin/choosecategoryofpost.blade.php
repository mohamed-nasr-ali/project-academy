@extends('adminlte::page')

@section('title', 'Academy')

@section('content_header')
    <h1>post type</h1>
@endsection

@section('content')
    <div class="box box-solid box-default">
        <div class="box-header with-border">
            <h3 class="box-title">choose category type</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->

            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <fieldset>
                <legend>Categories</legend>
                @foreach($categorz as $category)
                    <a href="{{route('checkcategory',$category->id)}}">
                        <button type="button" class="btn btn-info">{{$category->name}}</button>
                    </a>
                @endforeach
            </fieldset>

        </div>
        <!-- /.box-body -->
        <!-- box-footer -->
    </div>
    <!-- /.box -->
@endsection
