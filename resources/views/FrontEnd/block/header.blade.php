<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="{{route('home')}}">
                        <img src="{{asset('public/FrontEnd/img/logo.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul style="float: left ;">
                            <li class="active"><a href="{{route('home')}}">Homepage</a></li>
                            <li><a href="#">Categories <span class="arrow_carrot-down"></span></a>
                                <ul class="dropdown">
                                    @foreach ($categoris as $item)
                                    <li><a href="{{route('categori','id='.$item->id_categori)}}">{{$item->name_categori}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            {{-- <li><a href="{{route('blog')}}">Our Blog</a></li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="header__right">
                    <a href="#" class="search-switch"><span class="icon_search"></span></a>
                    <a href="{{route('login')}}"><span class="icon_profile"></span></a>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
@yield('banner_content')