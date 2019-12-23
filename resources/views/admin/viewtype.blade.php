
@extends('adminlte::page')

@section('title', 'Academy')

@section('content_header')
    <h1>Posts</h1>
    @include('admin.postsnav')
@endsection

@section('content')

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">{{$type->name}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if(count($posts)>0)
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4">
                            <ul class="thumbnail">
                                <div class="panel panel-info">
                                    <div class="panel-heading text-center">{{$post->title}}</div>
                                    <div class="panel-body">
                                        <img src="{{asset('storage/thumbnails/'.$post->image)}}" alt="Lights" class="img-thumbnail" style="height: 250px !important;">
                                    </div>
                                </div>
                                <ul class="breadcrumb">
                                    <li>{{$post->category->name}}</li>
                                    <li class="active">{{$post->type->name}}</li>
                                    <li>{{$post->semester->name}}</li>
                                </ul>
                                <blockquote style="height: 218px;">
                                    <p>{{$post->info}}</p>
                                    <small>{{$post->time}} &nbsp;//<cite title="Source Title">{{$post->year}}</cite></small><br>
                                    <form action="{{route('posts.destroy',$post->id)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button onclick="return confirm('Are you sure you want to Remove?');" type="submit" class="btn btn-danger">Remove Post</button>
                                    </form>
                                </blockquote>
                                <div class="btn-group btn-group-justified">
                                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info">Edit Post</a>
                                </div>
                            </ul>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <span>Num of Posts:</span> &nbsp; <mark>{{count($posts)}}</mark>
        </div>
        <!-- box-footer -->
    </div>
    <!-- /.box -->
@endsection


