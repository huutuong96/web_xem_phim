<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">
            @foreach ($banners as $item)
             
                <div class="hero__items set-bg" data-setbg="FrontEnd/img/banner/{{$item->image}}" style="image-rendering: pixelated;">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label">Adventure</div>
                                <h2>{{$item->title}}</h2>
                                <p>{{$item->content}}</p>
                                <a href="{{$item->other_information}}"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>