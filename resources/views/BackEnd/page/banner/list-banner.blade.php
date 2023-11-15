@extends('layout.master-layout-admin')

@section('link_css')
<style>
    .from{
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
        <?php
            $message = Session::get('message');
            if (isset($message)) {
                echo '<p class=" text-muted  style="color:green; margir-left:30px; front-size:20px""> <strong>Thông báo : </strong>'.$message.'</p>';
                Session::put('message',null);
            }else {
                echo '<p class="text-muted mb-4 mt-3">.</p>';
            } ?>
        @error('image')
            <div class="container " style="color:red">vì bạn chưa nhập hình ảnh nên hành động bị xóa bỏ</div>
        @enderror
        @error('title')
            <div class="container " style="color:red">vì bạn chưa nhập title nên hành động bị xóa bỏ</div>
        @enderror
        @error('content')
            <div class="container " style="color:red">vì bạn chưa nhập content nên hành động bị xóa bỏ</div>
        @enderror
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
                            <td>f</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->content}}</td>
                            <td>
                                <button class="btn btn-sm btn-outline-success edit_banner" value="{{$item}}" type="submit">Fix</button>
                                <a class="btn btn-sm btn-outline-primary" style="margin-left: 20px" href="{{route("delete_banner",'id='.$item->id_banner)}}">Delete</a>
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
<div class="from add_from">
    <form class="from__inner" action="" method="post" id="form"  enctype="multipart/form-data">
        @csrf
        <div class="from__header">
            <h5>Add Banner From</h5>
        </div>
        <div class="from__body">
            <div class="form_group">
                <label for="image">Image Banner<br>(chú ý: phải chọn ảnh )</label><br>
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
                <input type="text" name="other_information" id="other_information" placeholder="Có thể không cần nhập">
            </div>
            <button class="btn btn btn-sm btn-outline-success " style="margin:20px 40%; width: 20%;">save</button>
        </div>
        <div class="from__footer">
            <button class="closefrom" type="button">Close</button>
        </div>
    </form>
</div>

<div class="from fix_from">
    <form class="from__inner" action="" method="post" id="form"  enctype="multipart/form-data"  style="transform: translateY(13%);">
        @csrf
        <div class="from__header">
            <h5>Add Banner From</h5>
        </div>
        <div class="from__body">
            <div class="form_group">
                <label for="image">Image Banner<br>(nếu muốn thay đổi ảnh hãy chọn ảnh mới ở đây )</label><br>
                <input type="file" name="image" id="image"><img src="{{asset('public/FrontEnd/img/banner/4.png')}}" height="100px" alt="">
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
                <input type="text" name="other_information" id="other_information" placeholder="Có thể không cần nhập">
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
    var form = document.getElementById("form");//de thay doi action
    var edit_banners = document.getElementsByClassName("edit_banner");
    var closefrom = document.getElementsByClassName("closefrom");
    var from = document.querySelector(".from");//cac forn
    
    add_banners.onclick = form_bannerFN;
    
    for (var i = 0; i < edit_banners.length; i++) {
    edit_banners[i].onclick = form_bannerFN;
    }
    for (var i = 0; i < closefrom.length; i++) {
        closefrom[i].onclick = cadd_bannerFN;
    }
    closefrom.onclick = cadd_bannerFN;

    function form_bannerFN(){
        var value= this.value;
        if(value == "add"){
            from = document.querySelector(".add_from");
            form.action = "{{route("add_banner")}}"
            
        }else{
            var banner={}
            var banner = this.value
            alert(banner)
            from = document.querySelector(".fix_from");
            // form.action = "{{route("add_banner")}}"
            // from.classList.add("hidden")
        }
        from.classList.add("hidden")
    }

    function cadd_bannerFN(){
        from.classList.remove("hidden");
    }
    
</script>

      
@endsection
