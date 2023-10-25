
@extends('layout.master-layout-site')

{{-- link css --}}
@section('link_css')
    
@endsection

{{-- banner content --}}
@section('banner_content')
    
@endsection


{{-- main content --}}
@section('main_content')
    <h3 style="color: aliceblue">trang quản lý user</h3>



    <a href="{{route("logout")}}">đăng xuất</a>

@endsection

@section('link_js')
    
@endsection