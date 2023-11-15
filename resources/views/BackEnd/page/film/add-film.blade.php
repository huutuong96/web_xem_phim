@extends('layout.master-layout-admin')

@section('link_css')
    
@endsection

@section('link_js')
   
@endsection

@section('admin-content')

    <!-- Main content -->
    <section class="content">
        <form action="index.php?option=product&act=insert" method="post" enctype="multipart/form-data">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2">Thêm sản phẩm</h3>
                        <div class="card-tools">
                            <button type="submit" name="INSERT" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-secondary" href="index.php?option=product">
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
                                <input type="text" id="film_name" name="film_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="film_desc">Mô tả film</label>
                                <textarea id="film_desc" name="film_desc" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="link">link film</label>
                                <textarea id="link" name="link" class="form-control" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="id_categori">Danh mục film:</label>
                                <select id="id_categori" name="id_categori" class="form-control custom-select">
                                    <option value="{{$category[0]->id_categori}}">[--- Chọn loại cho film ---]</option>
                                    @foreach($category as $key=>$item)
                                    <option value="{{$item->id_categori}}">{{$item->name_categori}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="author">nhập tên tác giả:</label>
                                <input type="text" id="author" name="author" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="price_sale">Giá khuyến mãi:</label>
                                <input type="number" id="pricesale" name="pricesale" min="0" value="10000" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Số lượng sản phẩm: </label>
                                <input type="number" id="quantity" name="quantity" min="1" value="1" class="form-control">
                            </div>
                            <div class="form-group align-items-center">
                                <label for="img">Hình ảnh sản phẩm (*):</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" name="img[]" multiple onchange="updateFileNames()">
                                    <label class="custom-file-label" for="img">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái (*): </label>
                                <select id="status" name="status" class="form-control custom-select">
                                    <option selected>[--- Trạng thái sản phẩm ---]</option>
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Không xuất bản</option>
                                    <option value="0">Lưu trữ</option>
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
<script>
    $(function() {
        //Initialize Elements
        $('.select2').select2()
    });
    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
</script>
@endsection