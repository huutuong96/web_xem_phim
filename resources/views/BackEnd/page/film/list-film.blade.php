@extends('layout.master-layout-admin')

@section('link_css')
    
@endsection

@section('link_js')
   
@endsection

@section('admin-content')
<!-- Content Wrapper. Contains page content -->
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
                        <li class="breadcrumb-item active">Tất cả sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title font-weight-bold py-2">Danh sách sản phẩm</h3>
                                <div class="card-tools">
                                    <a class="btn btn-primary" href="{{route("add_film")}}">
                                        <i class="fa fa-plus"></i> Thêm mới
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable" style="width:100%" class="display table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-left" width="10px">#</th>
                                        <th class="text-center" width="200px">Hình</th>
                                        <th class="text-left" width="300px">Thông tin chung</th>
                                        <th class="text-left" width="">Mô tả</th>
                                  
                                        <th class="text-center" width="150px">Chức năng</th>
                                
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($film as $key => $row) : ?>
                                     {{-- @dd($row) --}}
                                        <tr>
                                            <td class="text-left">
                                                <input type="checkbox" name="checkid[]" value="<?= $row['id_film']; ?>">
                                            </td>
                                            <td class="text-left">
                                                <div id="imageSlider<?= $row['id']; ?>" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <img src="{{asset('public/FrontEnd/img/film/'.$row->film_image.'')}}" class="d-block w-100" alt="Image">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-left">
                                                Name:<br> <?= $row['film_name']; ?> <br><br>
                                                Thể loại :<br> <?= $row['film_genre']; ?><br><br>
                                                Số tập: <?= $row['epsode']; ?> <br>
                                                Tác giả: <?= $row['author']; ?> <br>
                                                ---------------------<br>
                                                Lượt xem: <?= $row['view']; ?><br>
                                                Sao đánh giá: <?= $row['star']; ?><br>
                                                
                                               
                                            </td>
                                            <td class="text-left"><?= $row['film_desc'] ?></td>
                                            
                                            <td class="text-center">
                                               
                                                <a class="btn btn-sm btn-info" href="index.php?option=product&act=update&id=<?= $row['id']; ?>"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-sm btn-danger" href="index.php?option=product&act=deltrash&id=<?= $row['id']; ?>"><i class="fa fa-trash"></i></a>
                                            </td>
                                         
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            {{$film->links()}}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
    
@endsection