
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand text-uppercase" style="font-size: xx-large" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <li class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                @if (Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/#about_us') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/#contact') }}">Contact</a>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">Home
                        </a>
                    </li>
                    @foreach($categorz as $category)
                        @if($category->name=='Scientific Research' || $category->name=='Tables' || $category->name=='Department')
                            @continue
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $category->name }}</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown01">
                                    @foreach($types as $type)
                                        @if($type->category_id==$category->id)
                                            <a class="dropdown-item" href="{{ route('subofgroup',$type->id) }}">{{ $type->name }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                        @endif
                    @endforeach
                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit(); ">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
