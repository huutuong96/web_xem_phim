@extends('layout.master-layout-site')

{{-- link css --}}
@section('link_css')
    
@endsection

{{-- banner content --}}
@section('banner_content')
    @include('FrontEnd.block.banner')
@endsection

{{-- main content --}}
@section('main_content')
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @include('FrontEnd.block.main-1')
                </div>    
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar"> 
                        @include('FrontEnd.block.right-top')
                        @include('FrontEnd.block.right-buttom')
                    </div>
                </div>
                                        
            </div>
        </div>
    </section>
@endsection


{{-- link js --}}
@section('link_js')

    @if(session('msg'))
    <script>
        alert("Bạn đã đăng nhập thành công")
    </script>
    @endif

@endsection