@extends('adminlte::page')

@section('title', 'Academy')

@section('content_header')
    <h1>Types</h1>
@endsection

@section('content')

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Create Type</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="panel-body">
                <form autocomplete="off" action="{{route('types.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">type name</label>

                        <input type="text" name="name" class="form-control" placeholder="Type Name" id="inputDefault">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                        <label for="category" class="col-md-4 control-label">category</label>

                        <select name="category" required>
                        @foreach($categorz as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>

                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection

