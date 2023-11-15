@extends('layout.master-layout-admin')

@section('link_css')
<style>
    .edit_from, .add_from{
        background: rgba(0,0,0,0.6);
        position: fixed;
        top:0;
        width: 80%;
        height: 100%;
        display: none;
    } 
    .from__inner{
        display: grid;
        width: 500px;
        margin: 0 auto;
        background-color: aliceblue;
        transform: translateY(20%);
    }
    
    .from__header{
        height: 50px;
        background-color: rgb(249, 103, 103);
        padding-left: 10px;
        color: aliceblue;
        font-size: large;
    }
    .from__header h5{
        display: flex;
        align-items: center;
        height: 100%;
    }
    .from__body{
        padding:0 10%;
        line-height: 30px;
    }
    .from__body h4{
        color:rgb(249, 103, 103) ;
    }
    .from__body input{
        width: 100%; 
    }
    .form_group{
        margin-top: 10px;
    }
    label {
    margin-bottom: unset;
    }
    .from__footer button{
        margin: unset;
        float: right;
        background-color:rgb(249, 103, 103) ;
        margin: 10px;
        color: aliceblue;
        border: 1px solid
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

@section('link_js')
   
@endsection

@section('admin-content')

    <div class="container-fluid pt-4 px-4" style=" padding-bottom:2rem;">
        <div class=" text-center rounded p-4" style=" background: rgb(255, 255, 255)">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Recent Salse</h6>
                {{-- <a href="" class="btn btn-sm btn-outline-success" > Add User</a> --}}
                <button class="btn btn btn-sm btn-outline-success " id="add_banner" value="add">Add User</button>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">image</th>
                            <th scope="col">title</th>
                            <th scope="col">content</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($banners))
                        @foreach ($banners as $key =>$item)
                        <tr>
                            <th>{{$item->id_banner}}</th>
                            <td><img src="{{asset('FrontEnd/img/banner/'.$item->image.'')}}" width="200px" alt=""></td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->content}}</td>
                            <td>
                                <button class="btn btn-sm btn-outline-success edit_banner" value="{{$item->id_banner}}">Fix</button>
                                <a class="btn btn-sm btn-outline-primary" style="margin-left: 20px" href="">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="7" >không có tài khoản nào có tên như vậy</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
{{-- //from add - edit --}}
<div class="add_from">
    <form class="from__inner">
        <div class="from__header">
            <h5>Add Banner From</h5>
        </div>
        <div class="from__body">
            <div class="form_group">
                <label for="image">Image Banner</label><br>
                <input type="file" name="image" id="image">
            </div>
            <div class="form_group">
                <label for="title">title</label><br>
                <input type="text" name="title" id="title">
            </div>
            <div class="form_group">
                <label for="content">content</label><br>
                <input type="text" name="content" id="content">
            </div>
            <div class="form_group">
                <label for="other_information">other_information</label><br>
                <input type="text" name="other_information" id="other_information">
            </div>
            <button class="btn btn btn-sm btn-outline-success " style="margin:20px 40%; width: 20%;">save</button>
        </div>
        <div class="from__footer">
            <button class="closefrom" >Close</button>
        </div>
    </form>
</div>
 
{{-- // --}}
{{-- //from  edit --}}
<div class=" edit_from">
    <form class="from__inner">
        <div class="from__header">
            <h5>Edit Banner From</h5>
        </div>
        <div class="from__body">
            <div class="form_group">
                <label for="image">Image Banner</label><br>
                <input type="file" name="image" id="image">
            </div>
            <div class="form_group">
                <label for="title">title</label><br>
                <input type="text" name="title" id="title">
            </div>
            <div class="form_group">
                <label for="content">content</label><br>
                <input type="text" name="content" id="content">
            </div>
            <div class="form_group">
                <label for="other_information">other_information</label><br>
                <input type="text" name="other_information" id="other_information">
            </div>
            <button class="btn btn btn-sm btn-outline-success " style="margin:20px 40%; width: 20%;">save</button>
        </div>
        <div class="from__footer">
            <button class="closefrom" type="button">Close</button>
        </div>
    </form>
</div>
 
{{-- // --}}
<script>
    var add_banners = document.getElementById("add_banner");
    var closefrom = document.getElementsByClassName("closefrom");
    var add_from = document.querySelector(".add_from");
    var edit_banners = document.getElementsByClassName("edit_banner");
    // var edit_from = document.querySelector(".edit_from");
    add_banners.onclick = add_bannerFN;
    // closefrom.onclick = cadd_bannerFN;
    
    // edit_banners.forEach(banner => {
    //     banner.onclick=edit_bannerFN;
    // });
    // closefrom.forEach(btn => {
    //     btn.onclick=cadd_bannerFN;
    // });

    // edit_banners.forEach(function(banner) {
    // banner.onclick = edit_bannerFN;
    // });
    // closefrom.forEach(function(btn) {
    //     btn.onclick = cadd_bannerFN;
    // });
    for (var i = 0; i < edit_banners.length; i++) {
        edit_banners[i].onclick = cadd_bannerFN.call(this);
    }
    for (var i = 0; i < closefrom.length; i++) {
        closefrom[i].onclick = cadd_bannerFN.call(this);
    }
    function add_bannerFN(){
        add_from.classList.add("hidden")
    }
    function edit_bannerFN(){
        edit_from.classList.add("hidden")
    }

    function cadd_bannerFN(){
        edit_from.classList.remove("hidden");
        add_from.classList.remove("hidden");
    }
</script>
      
@endsection
