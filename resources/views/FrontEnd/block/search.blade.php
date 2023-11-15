<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form" action="{{route("search")}}" method="post">
            @csrf
            <input type="text" id="search-input" placeholder="input name film ..." name="name">
        </form>
    </div>
</div>