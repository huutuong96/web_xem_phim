@extends('layout.master-layout-site')

{{-- link css --}}
@section('link_css')
    <style>
.modal{
    background: rgba(0,0,0,0.6);
    position: fixed;
    top:0;
    width: 100%;
    height: 100vh;
    display: none;
} 
.modal__inner{
    display: grid;
    grid-template-rows: 1fr 2fr 1fr;
    width: 340px;
    margin: 0 auto;
    background-color: aliceblue;
    transform: translateY(90%);
}

.modal__header{
    height: 50px;
    background-color: rgb(249, 103, 103);
    padding-left: 10px;
    color: aliceblue;
    font-size: large;
}
.modal__header h5{
    display: flex;
    align-items: center;
    height: 100%;
}
.modal__body{
    padding: 10px;
    line-height: 30px;
}
.modal__body h4{
    color:rgb(249, 103, 103) ;
}

.modal__footer button{
    margin: unset;
    float: right;
    background-color:rgb(249, 103, 103) ;
    margin: 10px;
    color: aliceblue;
}
.hidden{
    display: block;
}
.blog__details__comment__item__text button {
    border: unset;
	display: inline-block;
	color: #ffffff;
	background: rgba(255, 255, 255, 0.1);
	padding: 6px 20px;
	letter-spacing: 2px;
	border-radius: 2px;
	margin-right: 14px;
	-webkit-transition: all, 0.3s;
	-o-transition: all, 0.3s;
	transition: all, 0.3s;
}

.blog__details__comment__item__text button:hover {
	background: #e53637;
}
    </style>
@endsection

{{-- banner content --}}
@section('banner_content')

@endsection


{{-- main content --}}
@section('main_content')
<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="blog__details__title">
                    <h6>Action, Magic <span>- March 08, 2020</span></h6>
                    <h2>Anime for Beginners: 20 Pieces of Essential Viewing</h2>
                    <div class="blog__details__social">
                        <a href="#" class="facebook"><i class="fa fa-facebook-square"></i> Facebook</a>
                        <a href="#" class="pinterest"><i class="fa fa-pinterest"></i> Pinterest</a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin-square"></i> Linkedin</a>
                        <a href="#" class="twitter"><i class="fa fa-twitter-square"></i> Twitter</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="blog__details__pic">
                    <img src="{{asset('FrontEnd/img/blog/details/blog-details-pic.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="blog__details__content">
                        <div class="blog__details__text">
                            <p>As a result the last couple of eps haven’t been super exciting for me, because they’ve
                                been more like settling into a familiar and comfortable routine.  We’re seeing character
                                growth here but it’s subtle (apart from Shouyou, arguably).  I mean, Tobio being an
                                asshole is nothing new – it’s kind of the foundation of his entire character arc. 
                                Confronting whether his being an asshole is a problem for the Crows this directly is a
                                bit of an evolution, and probably an overdue one at that, but the overall dynamic with
                            Kageyama is basically unchanged.</p>
                        </div>
                        <div class="blog__details__item__text">
                            <h4>Tobio-Nishinoya showdown:</h4>
                            <img src="{{asset('FrontEnd/img/blog/details/bd-item-1.jpg')}}" alt="">
                            <p>In Japan the idea of a first-year speaking to a senior the way Kageyama did to Asahi is a
                                lot more shocking than it would be in the West, but Tobio calling out teammates in
                                genuinely rude fashion in the middle of a match is what got him isolated in the first
                                place.  It’s better for the Crows to sort this out in practice matches than the real
                                deal, but this is really on Tobio – he has to figure out how to co-exist with others in
                            a team environment.</p>
                        </div>
                        <div class="blog__details__item__text">
                            <h4>Nanatsu no Taizai: Kamigami No Gekirin</h4>
                            <img src="{{asset('FrontEnd/img/blog/details/bd-item-2.jpg')}}" alt="">
                            <p>In Japan the idea of a first-year speaking to a senior the way Kageyama did to Asahi is a
                                lot more shocking than it would be in the West, but Tobio calling out teammates in
                                genuinely rude fashion in the middle of a match is what got him isolated in the first
                                place.  It’s better for the Crows to sort this out in practice matches than the real
                                deal, but this is really on Tobio – he has to figure out how to co-exist with others in
                            a team environment.</p>
                        </div>
                        <div class="blog__details__item__text">
                            <h4>ID:Ianvaded:</h4>
                            <img src="{{asset('FrontEnd/img/blog/details/bd-item-3.jpg')}}" alt="">
                            <p>In Japan the idea of a first-year speaking to a senior the way Kageyama did to Asahi is a
                                lot more shocking than it would be in the West, but Tobio calling out teammates in
                                genuinely rude fashion in the middle of a match is what got him isolated in the first
                                place.  It’s better for the Crows to sort this out in practice matches than the real
                                deal, but this is really on Tobio – he has to figure out how to co-exist with others in
                            a team environment.</p>
                        </div>
                        <div class="blog__details__tags">
                            <a href="#">Healthfood</a>
                            <a href="#">Sport</a>
                            <a href="#">Game</a>
                        </div>
                        @include('FrontEnd.block.review-blog') 
                        <div class="blog__details__form">
                            <h4>Leave A Commnet</h4>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <textarea placeholder="Message"></textarea>
                                        <button type="submit" class="site-btn">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

@endsection
