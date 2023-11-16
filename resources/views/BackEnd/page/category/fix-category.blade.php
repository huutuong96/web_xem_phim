@extends('layout.master-layout-admin')

@section('link_css')
    
@endsection

@section('link_js')
   
@endsection

@section('admin-content')
<?php
$html_parentid = '';
$html_orders = '';
foreach ($category_list as $item) {
    if ($item['id'] == $row['parentid']) {
        $html_parentid .= '<option selected value="' . $item['id'] . '">' . $item['name'] . '</option>';
    } else {
        $html_parentid .= '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
    }
    if ($item['orders'] == ($row['orders'] - 1)) {
        $html_orders .= '<option selected value="' . $item['orders'] . '">Sau ' . $item['name'] . '</option>';
    } else {
        $html_orders .= '<option value="' . $item['orders'] . '">Sau ' . $item['name'] . '</option>';
    }
}
?>
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
        <form action="index.php?option=category&act=update" method="post" enctype="multipart/form-data">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2">Thêm danh mục</h3>
                        <div class="card-tools">
                            <button type="submit" name="UPDATE" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-secondary" href="{{route("category")}}">
                                <i class="fa fa-arrow-left"></i> Thoát
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="name">Tên danh mục (*)</label>
                                <input type="text" id="name" name="name" value="<?= $row['name'] ?>" class="form-control" required>
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="metakey">Metakey (SEO)</label>
                                <input type="text" id="metakey" name="metakey" value="<?= $row['metakey'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="metadesc">Metadesc (SEO)</label>
                                <input type="text" id="metadesc" name="metadesc" value="<?= $row['metadesc'] ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="parentid">Cấp cha (*):</label>
                                <select id="parentid" name="parentid" class="form-control custom-select">
                                    <option value="0">[--- Cấp cha ---]</option>
                                    <?= $html_parentid ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="orders">Sắp xếp (*):</label>
                                <select id="orders" name="orders" class="form-control custom-select">
                                    <option value="0">[--- Mặc định ---]</option>
                                    <?= $html_orders ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="img">Hình ảnh hiện tại:</label>
                                <img src="../public/images/category/<?= $row['img'] ?>" class="img-responsive w-100">
                            </div>
                            <div class="form-group align-items-center">
                                <label for="img">Hình ảnh đại diện (*):</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" name="img" onchange="updateFileNames()">
                                    <label class="custom-file-label" for="img">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái (*): </label>
                                <select id="status" name="status" class="form-control custom-select">
                                    <option selected>[--Trạng thái sản phẩm--]</option>
                                    <option value="1" <?php if ($row['status'] == 1) {
                                                            echo "selected";
                                                        } ?>>Xuất bản</option>
                                    <option value="2" <?php if ($row['status'] == 2) {
                                                            echo "selected";
                                                        } ?>>Không xuất bản</option>
                                    <option value="0" <?php if ($row['status'] == 0) {
                                                            echo "selected";
                                                        } ?>>Lưu trữ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2"></h3>
                        <div class="card-tools">
                            <button type="submit" name="UPDATE" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-secondary" href="index.php?option=category">
                                <i class="fa fa-arrow-left"></i> Thoát
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