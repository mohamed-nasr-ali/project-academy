
@extends('adminlte::page')

@section('title', 'Academy')

@section('content_header')
    <div style="position: absolute;right: 10px" class="m-4">
        <a href="{{route('newusers')}}" class="btn btn-danger" style="margin: 5px">
            <span>New+ {{\App\User::where('isnew','=','true')->count()}}</span>
        </a>
    </div>
    <div class="col-md-1">
        <h3>Users</h3>
    </div>

@endsection

@section('content')

    <div class="form-group m-2">
        <form action="{{ route('users.index') }}" method="get">

            <div class="row">

                <div class="col-md-4">
                   <input type="text" name="search" class="form-control" placeholder="search by Name" value="{{ request()->search }}">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> search</button>
                </div>

            </div>
        </form><!-- end of form -->
    </div>
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Users Table</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if(session('msg'))
                <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
                    <div class="card-header">Success {{session('msg')}}</div>
                </div>
            @endif
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">description</th>
                    <th scope="col" colspan="2" style="text-align: center">modify</th>
                    <th scope="col" colspan="3" style="text-align: center">status</th>
                </tr>
                </thead>
                <tbody>

                @if(count($users)>0)
                    @foreach($users as $index=>$user)
                        @if($user->isnew =='false')
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
                                <td style="text-align: center"><a href="{{route('users.edit',$user->id)}}">
                                        <button type="button" class="btn btn-info">Edit</button></a></td>
                                <td style="text-align: center">
                                    <form action="{{route('users.destroy',$user->id)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}

                                        <button onclick="return confirm('Are you sure you want to Remove?');" type="submit" class="btn btn-danger">Delete</button>

                                    </form>
                                </td>
                                <td style="text-align: center">
                                    <form action="{{route('active',$user->id)}}" method="post">
                                        {{csrf_field()}}
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
                @else
                    <h1>not found</h1>
                @endif
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div style="width: 100%;text-align: center">
                {{ $users->appends(request()->query())->links() }}
            </div>
        </div>
        <!-- box-footer -->
    </div>
    <!-- /.box -->
@endsection

