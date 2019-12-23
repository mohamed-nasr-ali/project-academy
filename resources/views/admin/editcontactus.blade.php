@extends('adminlte::page')

@section('title', 'Academy')

@section('content_header')

@endsection

@section('content')

    <div class="box box-solid">
        <div class="box-header with-border">
            <h1>Update Contact</h1>
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
                            <form autocomplete="off" class="form-horizontal" method="POST" action="{{ route('contactus.update',$contact->id) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                <div style="margin: 10px;" class="form-group{{ $errors->has('edara') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Edara</label>

                                    <div style="margin: 10px;" class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="edara" value="{{ $contact->edara }}"  autofocus>

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
                                        <input id="name" type="number" class="form-control" name="phone1" value="{{ $contact->phone1 }}"  >

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
                                        <input id="name" type="number" class="form-control" name="phone2" value="{{ $contact->phone2 }}"  >

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
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $contact->email }}" >

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
                                        <input id="name" type="text" class="form-control" name="description" value="{{ $contact->description }}"  >

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
                                        <input id="name" type="text" class="form-control" name="title" value="{{ $contact->title }}"  >

                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Upadte</button>
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


