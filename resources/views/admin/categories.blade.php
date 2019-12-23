<?php
$i=1;
?>
@extends('adminlte::page')

@section('title', 'Academy')

@section('content_header')
    <h1>Categories</h1>
@endsection

@section('content')

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Categories Table</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->

                <a class="btn btn-success" href="{{route('categories.create')}}">ADD Category</a>

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
                    <th scope="col" colspan="2" style="text-align: center">modify</th>
                </tr>
                </thead>
                <tbody>

                @if(count($categories)>0)

                    @foreach($categories as $category)

                        <tr class="table-success">
                            <th scope="row">{{$i++}}</th>
                            <td>{{$category->name}}</td>
                            <td class="text-center">
                                <a href="{{route('categories.edit',$category->id)}}">
                                    <button type="button" class="btn btn-info">Edit</button>
                                </a>
                            </td>
                            <td style="text-align: center">
                                <form action="{{route('categories.destroy',$category->id)}}" method="post">
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
            <div style="width: 100%;text-align: center">
                {{$categories->links()}}
            </div>
        </div>
        <!-- box-footer -->
    </div>
    <!-- /.box -->
@endsection

