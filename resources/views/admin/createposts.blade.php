
@extends('adminlte::page')

@section('title', 'Academy')

@section('content_header')
    <h1>Post</h1>
@endsection

@section('content')

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Create post</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="panel-body">
                <form  enctype="multipart/form-data" autocomplete="off" class="form-horizontal" method="POST" action="{{ route('posts.store') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="col-md-4 control-label">title</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" autofocus>

                            @if ($errors->has('title'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label for="image" class="col-md-4 control-label">image</label>

                        <div class="col-md-6">
                            <input id="image" type="file" class="form-control" name="image"   required>

                            @if ($errors->has('image'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('info') ? ' has-error' : '' }}">
                        <label for="info" class="col-md-4 control-label">info</label>

                        <div class="col-md-6">
                            <textarea maxlength="200" style="max-height: 200px;max-width: 100%;min-width: 100%;" name="info" value="{{ old('info') }}" required></textarea>
                            @if ($errors->has('info'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('info') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('semester') ? ' has-error' : '' }}">
                        <label for="semester" class="col-md-4 control-label">semester</label>
                        <div class="col-md-6">
                            <select name="semester" required>
                                @foreach($semesters as $semester)
                                    <option value="{{$semester->id}}">{{$semester->name}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('semester'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('semester') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                        <label for="category" class="col-md-4 control-label">category</label>
                        <div class="col-md-6">
                            <input type="radio" name="category" value="{{ $cat->id }}" checked> {{ $cat->name }}
                            @if ($errors->has('category'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                        <label for="type" class="col-md-4 control-label">type</label>

                        <div class="col-md-6">
                            <select name="type" required>
                                @foreach($typies as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('type'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                        <label for="year" class="col-md-4 control-label">year</label>

                        <div class="col-md-6">
                            <input id="year" type="date" class="form-control" name="year"  value="{{ old('year') }}" required>

                            @if ($errors->has('year'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                        <label for="time" class="col-md-4 control-label">Time</label>

                        <div class="col-md-6">
                            <input id="time" type="time" class="form-control" name="time" value="{{ old('time') }}" required>

                            @if ($errors->has('time'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('time') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        <label for="time" class="col-md-4 control-label">status</label>

                        <div class="col-md-6">
                            <select name="status">
                                <option value="0">disabled</option>
                                <option value="1">enabled</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection


