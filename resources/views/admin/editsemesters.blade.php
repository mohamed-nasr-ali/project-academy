@extends('adminlte::page')

@section('title', 'Academy')

@section('content_header')

@endsection

@section('content')

    <div class="box box-solid">
        <div class="box-header with-border">
            <h1>Update</h1>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <form autocomplete="off" class="form-horizontal" method="POST" action="{{ route('semesters.update',$semester->id) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Semester</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{$semester->name}}"  autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection


