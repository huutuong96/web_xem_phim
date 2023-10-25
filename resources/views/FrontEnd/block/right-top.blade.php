
    <div class="product__sidebar__view">
        <div class="section-title">
            <h5>Top Views</h5>
        </div>
        <ul class="filter__controls">
            <li class="active" data-filter="*">Day</li>
            <li data-filter=".week">Week</li>
            <li data-filter=".month">Month</li>
            <li data-filter=".years">Years</li>
        </ul>
        <div class="filter__gallery">
            @foreach ($top_view as $item)
                <div class="product__sidebar__view__item set-bg mix day years"
                    data-setbg="{{asset('FrontEnd/img/film/'.$item->film_image.'')}}">
                    <div class="ep">18 / ?</div>
                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                    <h5><a href="{{route('anime-detail','id='.$item->id_film)}}">{{$item->film_name}}</a></h5>
                </div>
             @endforeach
        </div>
    </div>
