@foreach ($arr as $item)
    <div class="trending__product">   
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="section-title">
                    <h4>{{$item[0]["name_categori"]}}</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="btn__all">
                    <a href="{{route('categori','id='.$item[0]["id_categori"])}}" class="primary-btn">View All <span class="arrow_right"></span></a>
                </div>
            </div>
        </div>
        <div class="row">
        @foreach ($item[1] as $row)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{asset('FrontEnd/img/film/'.$row->film_image.'')}}">
                        <div class="ep">18 / 18</div>
                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                    </div>
                    <div class="product__item__text">
                        <ul>
                            <li>Active</li>
                            <li>Movie</li>
                        </ul>
                        <h5><a href="{{route('anime-detail','id='.$row->id_film)}}">{{$row->film_name}}</a></h5>
                    </div>
                </div>
            </div>   
        @endforeach
        </div>
    </div>
@endforeach