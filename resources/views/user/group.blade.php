@extends('user.header')
@section('nav')
    @include('user.nav')
@endsection
@section('content')

    <!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- /.col-lg-3 -->

        <div class="col-lg-12">

            <div class="card mt-4">
                <div class="card-body">
                    <h3 class="card-title">{{$group->name}}</h3>
                </div>
            </div>
            <!-- /.card -->

            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    POSTS
                </div>
                <div class="card-body">
                    @if(count($postes)>0)
                        @foreach($postes as $post)
                            @if($post->status==1)
                                <h3>{{ $post->title }}</h3>
                                <p class="text-muted">{{ $post->info }}</p>
                                <small>{{ $post->time }}</small>

                                <a class="view" href="{{ route('poster',Crypt::encrypt($post->id)) }}">View</a>
                            <hr>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

    </div>

</div>
<!-- /.container -->

@endsection

