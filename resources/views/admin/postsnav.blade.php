<ul class="nav nav-pills">
        <li class="active"><a href="{{route('posts.index')}}">All posts</a></li>
                <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                Categories <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                @foreach($categorz as $category)
                        <li><a href="{{route('viewcategories',$category->id)}}" >{{$category->name}}</a></li>
                @endforeach
                </ul>
        </li>
        <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                Types <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                @foreach($types as $type)
                        <li><a href="{{route('viewtypes',$type->id)}}" >{{$type->name}}</a></li>
                @endforeach
                </ul>
        </li>
</ul>
