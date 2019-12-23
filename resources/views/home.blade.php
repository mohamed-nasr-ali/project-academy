

@extends('user.header')
@section('nav')
    @include('user.nav')
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">YOUR HOME PAGE</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                       {{Auth::user()->name}}
                        <hr>
                            <div class="form-group m-2">
                                <form action="{{ route('home') }}" method="get">

                                    <div class="row">

                                        <div class="col-md-4">
                                            <input type="text" name="search" class="form-control" placeholder="search" value="{{ request()->search }}">
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> search</button>
                                        </div>

                                    </div>
                                </form><!-- end of form -->
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="container">
        <h1 class="my-4">ALL POSTS
            <small>Academy Means THE Future</small>
        </h1>
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- Blog Post -->
                @if(count($allposts) > 0)
                    @foreach($allposts as $post)

                            <div class="card mb-4">
                                <img height="400px" class="card-img-top" style="background-color: #DDD;padding: 2px;box-sizing: border-box" src="{{ asset('storage/thumbnails/'.$post->image) }}" alt="Card image cap">
                                <div class="card-body">
                                    <h2 class="card-title">{{ $post->title }}</h2>
                                    <p class="card-text">{{ $post->info }}</p>
                                    <a href="{{ route('poster',Crypt::encrypt($post->id)) }}" class="btn btn-primary">View Post &rarr;</a>
                                </div>
                                <div class="card-footer text-muted">
                                    Posted on {{$post->time}} by
                                    <a href="{{ route('group',$post->category->id) }}">{{$post->category->name}}</a>
                                </div>
                            </div>

                    @endforeach
                @else
                    <div class="card mb-4" style="height: 500px">
                    <h1 class="m-4">not found</h1>
                    </div>
                @endif
                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        {{ $allposts->appends(request()->query())->links() }}
                    </li>
                </ul>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Categories Widget -->
                <div class="card">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-unstyled mb-0">
                                    @foreach($categorz as $category)
                                    <li style="font-size: 15px;">
                                        <a style="text-decoration: none" href="{{ route('group',$category->id) }}">{{ $category->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

@endsection
@section('footer')
    @include('user.footer')
@endsection
