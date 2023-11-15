@extends('layout.master-layout-admin')

@section('link_css')
    
@endsection

@section('link_js')
   
@endsection

@section('admin-content')
<?php
$colors = ALL_COLORS;
$sizes = ALL_SIZES;
$html_catid = '';
foreach ($list_category as $item) {
    if ($item['id'] == $row['catid']) {
        $html_catid .= '<option selected value="' . $item['id'] . '">' . $item['name'] . '</option>';
    } else {
        $html_catid .= '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
    }
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php?option=product">Sản phẩm</a></li>
                        <li class="breadcrumb-item active">Cập nhật</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="index.php?option=product&act=update" method="post" enctype="multipart/form-data">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2">Cập nhật sản phẩm</h3>
                        <div class="card-tools">
                            <button type="submit" name="UPDATE" class="btn btn-success"><i class="fa fa-save"></i> Lưu[CẬP NHẬT]</button>
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
                                <label for="name">Tên sản phẩm</label>
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <input type="text" id="name" name="name" value="<?= $row['name'] ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="smdetail">Mô tả sản phẩm</label>
                                <textarea id="smdetail" name="smdetail" class="form-control" rows="3"><?= trim($row['smdetail']) ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="detail">Chi tiết sản phẩm</label>
                                <textarea id="detail" name="detail" class="form-control" rows="4"><?= trim($row['detail']) ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="metakey">Metakey(SEO):</label>
                                <input type="text" id="metakey" name="metakey" class="form-control" value="<?= $row['metakey'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="metadesc">Metadesc(SEO):</label>
                                <textarea id="metadesc" name="metadesc" class="form-control" rows="4"><?= trim($row['metadesc']) ?></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Size:</label>
                                        <select class="select2" id="size" name="size[]" multiple="multiple" data-placeholder="Chọn size" style="width: 100%;">
                                            <?php
                                            // $all_sizes = array('XS', 'S', 'M', 'L', 'XL', 'XXL', '3XL');
                                            $selectedSizes = explode(',', str_replace(' ', '', $row['size'])); // Loại bỏ khoảng trắng sau dấu phẩy nếu có
                                            foreach ($sizes as $size) {
                                                $isSelected = in_array($size, $selectedSizes) ? 'selected' : '';
                                                echo "<option value=\"$size\" $isSelected>$size</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Color:</label>
                                        <select class="select2" id="color" name="color[]" multiple="multiple" data-placeholder="Chọn Màu" style="width: 100%;">
                                            <?php
                                            // $all_colors = array('Red', 'Blue', 'Green', 'Yellow', 'Black', 'White', 'Orange');
                                            $selectedColors = explode(',', str_replace(' ', '', $row['color']));
                                            foreach ($colors as $color) {
                                                $isSelected = in_array($color, $selectedColors) ? 'selected' : '';
                                                echo "<option value=\"$color\" $isSelected>$color</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="trending" class="col-md-6">Sản xu hướng:</label>
                                        <input type="checkbox" name="trending" id="trending" class="form-control col-md-6" data-bootstrap-switch data-off-color="danger" data-on-color="info" <?php if ($row['trending'] == 1) echo 'checked'; ?>>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="sale" class="col-md-6">Sản phẩm sale:</label>
                                        <input type="checkbox" name="sale" id="sale" class="form-control col-md-6" data-bootstrap-switch data-off-color="danger" data-on-color="info" <?php if ($row['sale'] == 1) echo 'checked'; ?>>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <?php $image_list = imglist_productid($row['id']); ?>
                                    <!-- Thêm trường ẩn để lưu trạng thái thay đổi hình ảnh -->
                                    <input type="hidden" name="image_changed" id="image_changed" value="0">
                                    <!-- Thêm trường ẩn để lưu danh sách hình ảnh hiện tại -->

                                    <label for="current_img" class="col-xs-6">Hình ảnh hiện tại (<?= count($image_list) ?>):</label>
                                    <div id="imageSlider<?= $row['id']; ?>" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php foreach ($image_list as $key => $img) : ?>
                                                <input type="hidden" name="current_images" id="current_images" value="<?= $img['img'] ?>">
                                                <div class="carousel-item <?= ($key === 0) ? 'active' : ''; ?>">
                                                    <img src="../public/images/product/<?= $img['img']; ?>" class="d-block w-100" alt="Image">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <a class="carousel-control-prev" href="#imageSlider<?= $row['id']; ?>" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#imageSlider<?= $row['id']; ?>" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="catid">Loại sản phẩm</label>
                                <select id="catid" name="catid" class="form-control custom-select">
                                    <option selected>[--Chọn loại sản phẩm--]</option>
                                    <?= $html_catid ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Giá sản phẩm</label>
                                <input type="number" id="price" name="price" min="10000" value="<?= $row['price'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="pricesale">Giá khuyến mãi sản phẩm</label>
                                <input type="number" id="pricesale" name="pricesale" min="0" value="<?= $row['pricesale'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Số lượng sản phẩm: </label>
                                <input type="number" id="quantity" name="quantity" min="1" value="<?= $row['quantity'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="view">Lượt xem: </label>
                                <input type="text" id="view" name="view" value="<?= $row['view'] ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái </label>
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
                            <div class="form-group align-items-center">
                                <label for="img">Hình ảnh sản phẩm:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" name="img[]" multiple onchange="updateFileNames()">
                                    <label class="custom-file-label" for="img">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2"></h3>
                        <div class="card-tools">
                            <button type="submit" name="UPDATE" class="btn btn-success"><i class="fa fa-save"></i> Lưu[CẬP NHẬT]</button>
                            <a class="btn btn-secondary" href="index.php?option=product">
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
<script>
    // Lấy tham chiếu đến trường ẩn image_changed
    const imageChangedInput = document.getElementById('image_changed');

    // Lấy tham chiếu đến trường input file cho hình ảnh
    const imageInput = document.getElementById('img');

    // Thêm sự kiện change cho trường input file
    imageInput.addEventListener('change', function() {
        // Khi người dùng thay đổi hình ảnh, đặt giá trị của trường image_changed thành 1
        imageChangedInput.value = '1';
    });
</script>
    
@endsection