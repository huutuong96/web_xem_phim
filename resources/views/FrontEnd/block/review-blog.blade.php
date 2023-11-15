
<div class="blog__details__btns">
    <div class="row">
        <div class="col-lg-6">
            <div class="blog__details__btns__item">
                <h5><a href="#"><span class="arrow_left"></span> Building a Better LiA...</a>
                </h5>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="blog__details__btns__item next__btn">
                <h5><a href="#">Mugen no Juunin: Immortal – 21 <span
                    class="arrow_right"></span></a></h5>
            </div>
        </div>
    </div>
    <div class="blog__details__comment">
        <h4>3 Comments</h4>
        {{-- // cha--}}
        <div class="blog__details__comment__item">
            <div class="blog__details__comment__item__pic">
                <img src="{{asset('public/FrontEnd/img/blog/details/comment-1.png')}}" alt="">
            </div>
            <div class="blog__details__comment__item__text">
                <span>Sep 08, 2020</span>
                <h5>John Smith</h5>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                adipisci velit, sed quia non numquam eius modi</p>
                <button >Like</button>
                <button class="openModal">Reply</button>
            </div>
        </div>
        {{-- //con --}}
                        <div class="blog__details__comment__item blog__details__comment__item--reply">
                            <div class="blog__details__comment__item__pic">
                                <img src="{{asset('public/FrontEnd/img/blog/details/comment-2.png')}}" alt="">
                            </div>
                            <div class="blog__details__comment__item__text">
                                <span>Sep 08, 2020</span>
                                <h5>Elizabeth Perry</h5>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                adipisci velit, sed quia non numquam eius modi</p>
                                <button >Like</button>
                                <button class="openModal">Reply</button>
                            </div>
                        </div>
{{-- //from bình luận --}}
{{-- <button id="openModal">open modal</button> --}}
    <div class="modal ">
        <div class="modal__inner">
            <div class="modal__header">
                <h5>welcome to anime</h5>
                <!-- <i class='bx bx-x'></i> -->
            </div>
            <div class="modal__body">
                <h4>
                    Bình luận
                </h4>
                <input type="text">
            </div>
            <div class="modal__footer">
                <button id="closeModal">Close</button>
            </div>
        </div>
    </div>
{{-- // --}}
<script>
    var openModals = document.getElementsByClassName("openModal");
    var closeModal = document.getElementById("closeModal");
    var modal = document.querySelector(".modal");

    Array.from(openModals).forEach(function(openModal) {
    openModal.onclick = openModalFN;
    });
    
    closeModal.onclick = copenModalFN;

    function openModalFN(){
        modal.classList.add("hidden")
    }

    function copenModalFN(){
        modal.classList.remove("hidden");
    }
</script>
        {{-- // --}}
        <div class="blog__details__comment__item">
            <div class="blog__details__comment__item__pic">
                <img src="{{asset('public/FrontEnd/img/blog/details/comment-3.png')}}" alt="">
            </div>
            <div class="blog__details__comment__item__text">
                <span>Sep 08, 2020</span>
                <h5>Adrian Coleman</h5>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                adipisci velit, sed quia non numquam eius modi</p>
                <button >Like</button>
                <button class="openModal">Reply</button>
            </div>
        </div>
    </div>
    
</div>