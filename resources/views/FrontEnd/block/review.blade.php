
        <div class="col-lg-8 col-md-8">
            <div class="anime__details__review">
                <div class="section-title">
                    <h5>Reviews</h5>
                </div>
                @foreach ($comments as $item)
                {{-- @dd($item) --}}
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="{{asset('FrontEnd/img/user/'.$item->image.'')}}" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>{{$item->name}}.  <span style="font-size:10px "> {{\Carbon\Carbon::parse($item->date)->format('d-m-Y') }} </span></h6>
                            <p>{{$item->content}}</p>
                        </div>
                    </div>
                @endforeach
                
            </div>
            <div class="anime__details__form">
                <div class="section-title">
                    <h5>Your Comment</h5>
                </div>
                <form action="{{ route('create-comment') }}" method="post">
                    <textarea placeholder="Your Comment" name="content"></textarea>
                    <input type="hidden" name="id_user" value="">           
                    <input type="hidden" name="id_film" value="{{$film->id_film}}">
                    <input type="hidden" name="role" value="0">
                    <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                </form>
            </div>
        </div>