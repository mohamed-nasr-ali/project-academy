
@extends('adminlte::page')

@section('title', 'Academy')

@section('content_header')
    <h1>Contacts</h1>
@endsection

@section('content')

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Create Contact</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="panel-body">
                <form autocomplete="off" action="{{route('contactus.store')}}" method="post">
                    {{csrf_field()}}

                    <div style="margin: 10px;" class="form-group{{ $errors->has('edara') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Edara</label>

                        <div style="margin: 10px;" class="col-md-6">
                            <input id="name" type="text" class="form-control" name="edara" value="{{ old('edara') }}"  autofocus>

                            @if ($errors->has('edara'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('edara') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div style="margin: 10px;" class="form-group{{ $errors->has('phone1') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">phone1</label>

                        <div style="margin: 10px;" class="col-md-6">
                            <input id="name" type="number" class="form-control" name="phone1" value="{{ old('phone1') }}"  >

                            @if ($errors->has('phone1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('phone1') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div style="margin: 10px;" class="form-group{{ $errors->has('phone2') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">phone2</label>

                        <div style="margin: 10px;" class="col-md-6">
                            <input id="name" type="number" class="form-control" name="phone2" value="{{ old('phone2') }}"  >

                            @if ($errors->has('phone2'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('phone2') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div style="margin: 10px;" class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div style="margin: 10px;" class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div style="margin: 10px;" class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Description</label>

                        <div style="margin: 10px;" class="col-md-6">
                            <input id="name" type="text" class="form-control" name="description" value="{{ old('description') }}"  >

                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div style="margin: 10px"  class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">title</label>

                        <div style="margin: 10px" class="col-md-6">
                            <input id="name" type="text" class="form-control" name="title" value="{{ old('title') }}"  >

                            @if ($errors->has('title'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection

