
@extends('adminlte::page')

@section('title', 'Academy')

@section('content_header')
    <h1>Users</h1>
@endsection

@section('content')

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Create Category</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="panel-body">
            <form autocomplete="off" action="{{route('categories.store')}}" method="post">
                {{csrf_field()}}

                    <input type="text" name="name" class="form-control" placeholder="Category Name" id="inputDefault">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    <br>
                    <button type="submit" class="btn btn-primary">Create</button>

            </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection

