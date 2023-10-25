<div class="product__sidebar__comment">
    <div class="section-title">
        <h5>New film</h5>
    </div>
    @foreach ($new as $item)
        <div class="product__sidebar__comment__item">
            <div class="product__sidebar__comment__item__pic">
                <img src="{{asset('FrontEnd/img/film/'.$item->film_image.'')}}" alt="" height="115px">
            </div>
            <div class="product__sidebar__comment__item__text">
                <ul>
                    <li>Active</li>
                    <li>Movie</li>
                </ul>
                <h5><a href="{{route('anime-detail','id='.$item->id_film)}}">{{$item->film_name}}</a></h5>
                <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
            </div>
        </div>
    @endforeach
</div>