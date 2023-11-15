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
                        <a href="#">{{$categories}}</a>
                        <span>{{$film->film_name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__video__player">
                        <iframe width="100%" height="500px" src="{{$film->link}}"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    <div class="anime__details__episodes">
                        @if ($film->epsode != null)
                        <div class="section-title">
                            <h5>List Film epsode</h5>
                        </div>
                        <a href="#">Ep 01</a>
                        <a href="#">Ep 02</a>
                        <a href="#">Ep 03</a>
                        <a href="#">Ep 04</a>
                        <a href="#">Ep 05</a>
                        <a href="#">Ep 06</a>
                        <a href="#">Ep 07</a>
                        <a href="#">Ep 08</a>
                        <a href="#">Ep 09</a>
                        <a href="#">Ep 10</a>
                        <a href="#">Ep 11</a>
                        <a href="#">Ep 12</a>
                        <a href="#">Ep 13</a>
                        <a href="#">Ep 14</a>
                        <a href="#">Ep 15</a>
                        <a href="#">Ep 16</a>
                        <a href="#">Ep 17</a>
                        <a href="#">Ep 18</a>
                        <a href="#">Ep 19</a>
                        
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8" >
                    <div class="anime__details__review" id="show_comment">
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
                
                $.get("{{route("add_comment")}}", {"id_film":{{$film->id_film}}, "rule": rule, "content": content}, function(data) { show_comment();});
            })
        })
        function show_comment() {
            $.get("{{route("all_comments")}}",{"id": {{$film->id_film}} },function (data) {
                $("#show_comment").html(data);
                })
            $("#input_content").val("")
        }
        



    </script>
@endsection