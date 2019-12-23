@extends('user.header')
@section('nav')
    @include('user.nav')
@stop
@section('content')
<!-- Page Content -->

<div style="margin-bottom: 20px;margin-top: -20px" id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators" style="margin: 0 auto">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img style="width: 100%" class="d-block img-fluid" src="{{ URL::asset('images/one.jpg') }}" alt="First slide">
        </div>
        <div class="carousel-item">
            <img style="width: 100%" class="d-block img-fluid" src="{{ URL::asset('images/two.jpg') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img style="width: 100%" class="d-block img-fluid" src="{{ URL::asset('images/three.jpg') }}" alt="Third slide">
        </div>
        <div class="carousel-item">
            <img style="width: 100%" class="d-block img-fluid" src="{{ URL::asset('images/four.jpg') }}" alt="Fourth slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<section class="container">

    <div class="row">
        @if(!Auth::guest())
        <div class="col-lg-12">
            <h1 class="my-4 text-uppercase"><i class="fab fa-acquisitions-incorporated"></i>important</h1>
            <div class="list-group text-center">
                @foreach($categorz as $category)
                    @if($category->name=='Scientific Research' || $category->name=='Tables')
                        <span style="border: 1px solid #000;background-color: black;color: #ffffff" href="#" class="list-group-item">{{$category->name}}</span>
                        @foreach($types as $type)
                            @if($category->id ==$type->category_id)
                                <a  href="{{ route('subofgroup',$type->id) }}" class="list-group-item">{{$type->name}}</a>
                            @else
                                @continue
                            @endif
                        @endforeach
                    @else
                        @continue
                    @endif
                    <hr>
                @endforeach
            </div>
        </div>
        @endif
        <!-- /.col-lg-3 -->


            <div class="row">
                @if(count($views))
                    @foreach($views as $view)
                        @if($view->status==1)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                    <a href="{{asset('storage/thumbnails/'.$view->image)}}"><img width="700px" height="350px" class="card-img-top" src="{{asset('storage/thumbnails/'.$view->image)}}" alt="{{ $view->title }}"></a>
                                    <div class="card-body">
                                        <h4 class="card-title text-center">
                                            {{ $view->title }}
                                        </h4>
                                        <h5>{{ $view->category->name }}</h5>
                                        <p class="card-text">{{ $view->info }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">{{ $view->time }}</small> &nbsp; &nbsp;
                                        <a class="btn btn-info m-2" href="{{route('poster',Crypt::encrypt($view->id))}}">View</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <!-- /.row -->
        </div>
        <!-- /.col-lg-9 -->
    </div>
    <!-- /.row -->
    <section class="page-section" id="about_us" style="margin: 100px 0;box-sizing: border-box;padding: 100px 0 0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0">About Us !</h2>
                    <hr class="divider my-4">
                    <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
            </div>
            <div class="col-md-12 mb-12">
                <h2>What We Do</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>
            </div>
        </div>
    </section>
    <!-- / .row -->
    <!--contacts-->
    <section class="page-section" id="contact" style="margin: 100px 0;box-sizing: border-box;padding: 100px 0 0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0">Contact US</h2>
                    <hr class="divider my-4">
                    <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
            </div>
            <div class="row m-5">
                <div class="col-lg-4 ml-auto text-center">
                    <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                    <div>+1 (202) 555-0149</div>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                    <!-- Make sure to change the email address in anchor text AND the link below! -->
                    <a class="d-block" href="#">Academy@Gmail.com</a>
                </div>
            </div>

            @foreach($contacts as $contact)
                <div class="col-md-4 mb-5">
                    <h2>{{ $contact->edara }}</h2>
                    <hr>
                    <address>
                        <strong>{{ $contact->title }}</strong>
                        <br>{{ $contact->description }}
                        <br>
                    </address>
                    <address>
                        <span title="Phone">P:</span>
                        {{ $contact->phone1 }}
                        <br>
                        <span title="Phone">P:</span>
                        {{ $contact->phone2 }}
                        <br>
                        <span title="Email">E:</span>
                        <a href="">{{ $contact->email }}</a>
                    </address>
                </div>
            @endforeach
        </div>
    </section>
</div>
<!-- /.container -->

</section>
@endsection
@section('footer')
    @include('user.footer')
@endsection