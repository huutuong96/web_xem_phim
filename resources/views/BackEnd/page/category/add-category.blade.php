@extends('layout.master-layout-admin')

@section('link_css')
    
@endsection

@section('link_js')
   
@endsection

@section('admin-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý danh mục sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php?option=category">Danh mục sản phẩm</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{route('add_category')}}" method="post">
            @csrf
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2">Thêm danh mục</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="name">Tên danh mục (*)</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="status">Trạng thái (*): </label>
                                <select id="status" name="status" class="form-control custom-select">
                                    <option value="0" selected>[--- Trạng thái danh mục ---]</option>
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Tạm thời chưa hoạt động</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2"></h3>
                        <div class="card-tools">
                            
                            <button type="submit" name="INSERT" class="btn btn-primary " style="font-size: large;color: rgb(54, 42, 219);margin-right: 20px"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-primary" href="{{route('category')}}">
                                <i class="{{route("category")}}"></i> Thoát
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </form>
    </section>
    <!-- /.content -->
</div>

    
@endsection
@section('link_js')

@endsection