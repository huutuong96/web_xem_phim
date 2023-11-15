@extends('layout.master-layout-site')

{{-- link css --}}
@section('link_css')

@endsection

{{-- banner content --}}
@section('banner_content')
    
@endsection


{{-- main content --}}
@section('main_content')

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <a href="#">Categories</a>
                        <span>Romance</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="{{asset('public/FrontEnd/img/film/'.$film->film_image.'')}}">
                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                            <div class="view"><i class="fa fa-eye"></i> {{$film->view}}</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{$film->film_name}}</h3>
                                <span>{{$film->author}}</span>
                            </div>
                            <div class="anime__details__rating">
                                <div class="rating">
                                    @for ($i = 0; $i < $film->star; $i++)
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    @endfor
{{--                               <a href="#"><i class="fa fa-star-half-o"></i></a> 1/2 sao                --}}
                                </div>
                                <span>{{$film->view}} Votes</span>
                            </div>
                            <p>{{$film->film_desc}}</p>

                            {{--                    other information
                                 <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Type:</span> TV Series</li>
                                            <li><span>Studios:</span> Lerche</li>
                                            <li><span>Date aired:</span> Oct 02, 2019 to ?</li>
                                            <li><span>Status:</span> Airing</li>
                                            <li><span>Genre:</span> Action, Adventure, Fantasy, Magic</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Scores:</span> 7.31 / 1,515</li>
                                            <li><span>Rating:</span> 8.5 / 161 times</li>
                                            <li><span>Duration:</span> 24 min/ep</li>
                                            <li><span>Quality:</span> HD</li>
                                            <li><span>Views:</span> 131,541</li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="anime__details__btn">
                                <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a>
                                <a href="{{route('anime-watching', 'id='.$film->id_film)}}" class="watch-btn"><span>Watch Now</span> <i
                                    class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8" >
                        <div class="anime__details__review" id="show_comment" style="width: 80%">
                                {{-- binh luan dc show o day --}}
                        </div>
                         <div class="anime__details__form">
                            <div class="section-title">
                                <h5>Your Comment</h5>
                            </div>
                            <form action="#" >
                                <textarea placeholder="Your Comment" name="content" id="input_content"></textarea>         
                                <input type="hidden" id="comment_rule" name="rule" value="0">
                                <button type="button" id="send_comment"><i class="fa fa-location-arrow"></i> Review</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="product__sidebar"> 
                            @include('FrontEnd.block.right-top')
                        </div>
                    </div>
                </div>
            </div> 
        </section>
        <!-- Anime Section End -->

@endsection

@section('link_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            show_comment();

                //send comment
            $("#send_comment").click(function () {
                var rule = $("#comment_rule").val();
                var content = $("#input_content").val();
                // alert("bình luận : "+content)
                
                $.get("{{route("add_comment")}}", {"id_film":{{$film->id_film}}, "rule": rule, "content": content}, function(data) { show_comment()});
            })
        })
        function show_comment() {
            $.get('{{route("all_comments")}}',{"id": {{$film->id_film}} },function (data) {
                $("#show_comment").html(data);
                })
            $("#input_content").val("")
        }
        



    </script>
@endsection