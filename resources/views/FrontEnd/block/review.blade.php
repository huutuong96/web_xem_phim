

                <div class="section-title">
                    <h5>Reviews</h5>
                    
                </div>
                @foreach ($comments as $item)
                {{-- @dd($item) --}}
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="{{asset('public/FrontEnd/img/user/'.$item->image.'')}}" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6>{{$item->name}}.  <span style="font-size:10px "> {{\Carbon\Carbon::parse($item->date)->format('d-m-Y') }} </span></h6>
                            <p>{{$item->content}}</p>
                        </div>
                    </div>
                @endforeach
