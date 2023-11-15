@extends('layout.master-layout-admin')

@section('link_css')
    
@endsection

@section('link_js')
   
@endsection

@section('admin-content')

    <!-- Main content -->
    <section class="content">
        <form action="{{route("edit_film" , "id=".$film['id_film'])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2">Sửa thông tin film</h3>
                        <div class="card-tools">
                            <button type="submit" name="INSERT" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-secondary" href="{{route("film")}}">
                                <i class="fa fa-arrow-left"></i> Thoát
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="film_name">Tên film</label>
                                <input type="text" id="film_name" name="film_name" class="form-control" value="{{$film->film_name}}">
                                @error('film_name')
                                    <div class="spam" style="color:red">{{$message}}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="film_desc">Mô tả film</label>
                                <textarea id="film_desc" name="film_desc" class="form-control" rows="4" >{{$film->film_desc}}</textarea>
                                @error('film_name')
                                    <div class="spam" style="color:red">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="link">link film</label>
                                <textarea id="link" name="link" class="form-control" rows="1">{{$film->link}}</textarea>
                                @error('film_name')
                                    <div class="spam" style="color:red">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="other_information">Thông tin khác (Có thể không cần nhập)</label>
                                <textarea id="other_information" name="other_information" class="form-control" rows="1">{{$film->other_information}}</textarea>
                                @error('film_name')
                                    <div class="spam" style="color:red">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group" style="float: right">
                                <img src="{{asset("public/FrontEnd/img/film/".$film->film_image."")}}" style="height:200px" alt="">
                                <input type="hidden" name="image" id="" value="{{$film->film_image}}">
                                <input type="hidden" name="view" id="" value="{{$film->view}}">
                                <input type="hidden" name="star" id="" value="{{$film->star}}">
                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="id_categori">Danh mục film:</label>
                                <select id="id_categori" name="id_categori" class="form-control custom-select">
                                    <option value="{{$film->id_categori}}">{{$film->name_categori}}</option>
                                    @foreach($category as $key=>$item)
                                    <option value="{{$item->id_categori}}">{{$item->name_categori}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="author">Nhập tên tác giả:</label>
                                <input type="text" id="author" name="author" class="form-control" value="{{$film->author}}">
                                @error('film_name')
                                    <div class="spam" style="color:red">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="film_genre">Thể loại </label>
                                <input type="text" id="film_genre" name="film_genre" class="form-control" value="{{$film->film_genre}}">
                                @error('film_name')
                                    <div class="spam" style="color:red">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group align-items-center">
                                <label for="img"> ảnh film (*):</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" name="img" multiple onchange="updateFileNames()">
                                    <label class="custom-file-label" for="img">Choose file</label>
                                    @error('film_name')
                                        <div class="spam" style="color:red">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái (*): </label>
                                <select id="status" name="status" class="form-control custom-select">
                                    <option value="0" selected>[--- Trạng thái sản phẩm ---]</option>
                                    <option value="1">Xuất bản</option>
                                    <option value="0">Không xuất bản</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </form>
    </section>
    <!-- /.content -->


    
@endsection
@section('link_js')

@endsection