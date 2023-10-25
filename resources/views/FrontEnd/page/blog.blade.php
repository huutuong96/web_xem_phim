@extends('layout.master-layout-site')

{{-- link css --}}
@section('link_css')
    
@endsection

{{-- banner content --}}
@section('banner_content')
    
@endsection


{{-- main content --}}
@section('main_content')
    @include('FrontEnd.block.nav')
   <!-- Blog Section Begin -->
   <section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog__item set-bg" data-setbg="{{asset('FrontEnd/img/blog/blog-1.jpg')}}">
                            <div class="blog__item__text">
                                <p><span class="icon_calendar"></span> 01 March 2020</p>
                                <h4><a href="{{route('blog-detail')}}">Yuri Kuma Arashi Viverra Tortor Pharetra</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item small__item set-bg" data-setbg="{{asset('FrontEnd/img/blog/blog-4.jpg')}}">
                            <div class="blog__item__text">
                                <p><span class="icon_calendar"></span> 01 March 2020</p>
                                <h4><a href="{{route('blog-detail')}}">Bok no Hero Academia Season 4 – 18</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item small__item set-bg" data-setbg="{{asset('FrontEnd/img/blog/blog-5.jpg')}}">
                            <div class="blog__item__text">
                                <p><span class="icon_calendar"></span> 01 March 2020</p>
                                <h4><a href="{{route('blog-detail')}}">Fate/Stay Night: Untimated Blade World</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="blog__item set-bg" data-setbg="{{asset('FrontEnd/img/blog/blog-7.jpg')}}">
                            <div class="blog__item__text">
                                <p><span class="icon_calendar"></span> 01 March 2020</p>
                                <h4><a href="{{route('blog-detail')}}">Housekishou Richard shi no Nazo Kantei Season 08 - 20</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item small__item set-bg" data-setbg="{{asset('FrontEnd/img/blog/blog-10.jpg')}}">
                            <div class="blog__item__text">
                                <p><span class="icon_calendar"></span> 01 March 2020</p>
                                <h4><a href="{{route('blog-detail')}}">Fate/Stay Night: Untimated Blade World</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item small__item set-bg" data-setbg="{{asset('FrontEnd/img/blog/blog-11.jpg')}}">
                            <div class="blog__item__text">
                                <p><span class="icon_calendar"></span> 01 March 2020</p>
                                <h4><a href="{{route('blog-detail')}}">Building a Better LiA Drilling Down</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item small__item set-bg" data-setbg="{{asset('FrontEnd/img/blog/blog-2.jpg')}}">
                            <div class="blog__item__text">
                                <p><span class="icon_calendar"></span> 01 March 2020</p>
                                <h4><a href="{{route('blog-detail')}}">Fate/Stay Night: Untimated Blade World</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item small__item set-bg" data-setbg="{{asset('FrontEnd/img/blog/blog-3.jpg')}}">
                            <div class="blog__item__text">
                                <p><span class="icon_calendar"></span> 01 March 2020</p>
                                <h4><a href="{{route('blog-detail')}}">Building a Better LiA Drilling Down</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="blog__item set-bg" data-setbg="{{asset('FrontEnd/img/blog/blog-6.jpg')}}">
                            <div class="blog__item__text">
                                <p><span class="icon_calendar"></span> 01 March 2020</p>
                                <h4><a href="{{route('blog-detail')}}">Yuri Kuma Arashi Viverra Tortor Pharetra</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item small__item set-bg" data-setbg="{{asset('FrontEnd/img/blog/blog-8.jpg')}}">
                            <div class="blog__item__text">
                                <p><span class="icon_calendar"></span> 01 March 2020</p>
                                <h4><a href="{{route('blog-detail')}}">Bok no Hero Academia Season 4 – 18</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item small__item set-bg" data-setbg="{{asset('FrontEnd/img/blog/blog-9.jpg')}}">
                            <div class="blog__item__text">
                                <p><span class="icon_calendar"></span> 01 March 2020</p>
                                <h4><a href="{{route('blog-detail')}}">Fate/Stay Night: Untimated Blade World</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="blog__item set-bg" data-setbg="{{asset('FrontEnd/img/blog/blog-12.jpg')}}">
                            <div class="blog__item__text">
                                <p><span class="icon_calendar"></span> 01 March 2020</p>
                                <h4><a href="{{route('blog-detail')}}">Yuri Kuma Arashi Viverra Tortor Pharetra</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection
