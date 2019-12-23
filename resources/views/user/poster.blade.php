@extends('user.header')
@section('nav')
    @include('user.nav')
@endsection
@section('content')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

                <!-- Post Content Column -->
                <div class="col-lg-12">

                    <!-- Title -->
                    <h1 class="mt-4">{{ $poster->title }}</h1>

                    <!-- Author -->
                    <p class="lead">
                        by
                        <a href="{{ route('group',$poster->category->id) }}">{{ $poster->category->name }}</a>
                    </p>

                    <hr>

                    <!-- Date/Time -->
                    <p>Posted on {{ $poster->year }}, {{ $poster->time }}</p>

                    <hr>

                    <!-- Preview Image -->
                    <img class="img-fluid rounded" style="width:100%;height:400px;margin: 0 auto" src="{{ asset('storage/thumbnails/'.$poster->image) }}" alt="{{ $poster->title }}">

                    <hr>

                    <!-- Post Content -->
                    <p class="lead">{{ $poster->info }}</p>
                    <blockquote class="blockquote">
                        <p class="mb-0"></p>
                        <footer class="blockquote-footer">Section: &nbsp;{{ $poster->type->name }} &triangleright;
                            <cite title="Source Title">{{ $poster->semester->name }} Semester</cite>
                        </footer>
                    </blockquote>
                    <hr>
                    @if(Auth::user() && Auth::user()->status==1 )
                        <!-- Comments Form -->
                        <div class="card my-4">
                            <h5 class="card-header">Leave a Comment:</h5>
                            <div class="card-body">
                                <form autocomplete="off" action="{{route('comments.store')}}" method="post">
                                    {{csrf_field()}}

                                    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                        <textarea id="comment" name="comment" class="form-control" maxlength="200" style="max-height: 100px;min-height: 100px"></textarea>
                                        @if ($errors->has('comment'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('comment') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <input type="hidden" value="{{ Crypt::encrypt($poster->id) }}" name="post_id">
                                    <button type="submit" class="btn btn-primary">Comment</button>
                                </form>
                            </div>
                        </div>

                        <!-- Single Comment -->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Comments</h3>
                            </div>
                            <div class="panel-body">
                                @foreach($comments as $comment)
                                    @if($comment->post_id==$poster->id)
                                        <div class="media mb-4">
                                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                            <div class="media-body">
                                                <h5 class="mt-0">{{ $comment->user->name }}</h5>
                                                {{ $comment->comment }}
                                            </div>
                                            @if($comment->user->id==Auth::user()->id)
                                                <div class="m-4">
                                                    <a href="{{ route('comments.edit',Crypt::encrypt($comment->id)) }}">
                                                        <button style="background-color: #FFF;border: none"><i class="fas fa-edit"></i></button>
                                                    </a>

                                                </div>
                                                <div class="m-4">
                                                    <form action="{{ route('comments.destroy',Crypt::encrypt($comment->id)) }}" method="post">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                        <button style="background-color: #FFF;border: none"  onclick="return confirm('Are you sure you want to Remove?');" type="submit"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                        <hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        <!-- /.row -->
    </div>
    <!-- /.container -->


@endsection
@section('footer')
    @include('user.footer')
@endsection