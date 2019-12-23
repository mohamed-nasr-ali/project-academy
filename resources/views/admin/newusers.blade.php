
@extends('adminlte::page')

@section('title', 'Academy')

@section('content_header')
    <h1>Users</h1>
@endsection

@section('content')
    <div class="form-group m-2">

    </div>
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">NEW Users</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                @if(session('msg'))
                    <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
                        <div class="card-header">Success {{session('msg')}}</div>
                    </div>
                @endif
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">description</th>
                    <th scope="col" colspan="3" style="text-align: center">status</th>
                </tr>
                </thead>
                <tbody>

                    @if(count($users)>0)

                        @foreach($users as $index=>$user)
                            @if($user->status==0 && $user->isnew==true)
                            <tr class="table-success">
                                <th scope="row">{{$index+1}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        @if(count($user->roles)>1)
                                            [{{$role->name}}]
                                        @else
                                            {{$role->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td style="text-align: center">
                                    <form action="{{route('newuseractive',$user->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" value="false" name="isnew">
                                        @if($user->status==1)
                                            <input checked type="radio" value="1" name="active">active |
                                            <input type="radio" value="0" name="active">disactive
                                        @else
                                            <input  type="radio" value="1" name="active">active |
                                            <input checked type="radio" value="0" name="active">disactive
                                        @endif
                                        <button type="submit" class="margin btn btn-warning">change status</button>

                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- box-footer -->
    </div>
    <!-- /.box -->
@endsection

