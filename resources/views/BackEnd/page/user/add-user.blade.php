@extends('layout.master-layout-admin')

@section('link_css')
    
@endsection

@section('link_js')
   
@endsection

@section('admin-content')

    <!-- Main content -->
    <section class="content">
        <form action="{{route("add_users")}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2">Thêm user</h3>
                        <div class="card-tools">
                            <button type="submit" name="INSERT" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-secondary" href="index.php?option=product">
                                <i class="{{route("users")}}"></i> Thoát
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="name">Tên tài khoản</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{old("name")}}">
                                @error('name')
                                    <div class="spam" style="color:red">{{$message}}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="email">địa chỉ email</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{old("email")}}">
                                
                                @error('email')
                                    <div class="spam" style="color:red">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" id="password" name="password" class="form-control" value="{{old("password")}}">

                                @error('password')
                                    <div class="spam" style="color:red">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Nhập lại mật khẩu</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" value="{{old("password_confirmation")}}">
                                
                                @error('password_confirmation')
                                    <div class="spam" style="color:red">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="status">vị trí (*): </label>
                                <select id="status" name="status" class="form-control custom-select">
                                    <option value="0" selected>[--- vị trí của user ---]</option>
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
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