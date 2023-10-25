@extends('layout.master-layout-site')

{{-- link css --}}
@section('link_css')
    
@endsection

{{-- banner content --}}
@section('banner_content')
    {{-- @include('FrontEnd.block.banner') --}}
@endsection

{{-- main content --}}
@section('main_content')
    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @include('FrontEnd.block.main-1')

                    {{-- Phân Trang --}}
                    <div class="product__pagination">
                        <a href="#" class="current-page">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#"><i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-8">
                    @include('FrontEnd.block.right-top')
                    @include('FrontEnd.block.right-buttom')
                </div>
            </div>
        </div>
    </section>
@endsection


{{-- link js --}}
@section('link_js')
    
@endsection