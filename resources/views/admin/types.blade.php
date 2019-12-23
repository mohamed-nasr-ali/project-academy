<?php
$i=1;
?>
@extends('adminlte::page')

@section('title', 'Academy')

@section('content_header')
    <h1>Types</h1>
@endsection

@section('content')

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Types Table</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->

                <a class="btn btn-success" href="{{route('types.create')}}">ADD Types</a>

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
                    <th scope="col">Type Name</th>
                    <th scope="col">category Name</th>
                    <th scope="col" colspan="2" style="text-align: center">modify</th>
                </tr>
                </thead>
                <tbody>

                @if(count($types)>0)

                    @foreach($types as $type)

                        <tr class="table-success">
                            <th scope="row">{{$i++}}</th>
                            <td>{{$type->name}}</td>
                            <td>{{$type->category->name}}</td>
                            <td style="text-align: center"><a href="{{route('types.edit',$type->id)}}">
                                    <button type="button" class="btn btn-info">Edit</button></a></td>
                            <td style="text-align: center">
                                <form action="{{route('types.destroy',$type->id)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}

                                    <button onclick="return confirm('Are you sure you want to Remove?');" type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                @endif
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <span>Num of Rec:</span> &nbsp; <mark>{{count($types)}}</mark>
        </div>
        <!-- box-footer -->
    </div>
    <!-- /.box -->
@endsection

