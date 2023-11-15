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
        <?php
        $message = Session::get('message');
        if (isset($message)) {
            echo '<p class=" text-muted  style="color:green; margir-left:30px; front-size:20px""> <strong>Thông báo : </strong>'.$message.'</p>';
            Session::put('message',null);
        }else {
            echo '<p class="text-muted mb-4 mt-3">.</p>';
        } ?>
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
                                <h3 class="card-title font-weight-bold py-2">Danh sách danh mục</h3>
                                <div class="card-tools">
                                    <a class="btn btn-primary" href="{{route('add_category')}}">
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
                                        <th class="text-center" width="5%">#</th>
                                        <th class="text-center" width="40%">name</th>
                                        <th class="text-center" width="20%">Trạng thái</th>
                                        <th class="text-center" width="40%">Chức năng</th>
                                        <th class="text-center" width="10px">ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($category as $row) : ?>
                                        <tr>
                                            <td class="text-center"><input type="checkbox" name="checkid[]" value="<?= $row['id_categori']; ?>"></td>
                                            
                                            <td class="text-center">
                                                <?= $row['name_categori']; ?>
                                            </td>
                                            <td class="text-center"><?= $row['status']==1? "Đang hoạt động ": "tam ngưng" ?></td>

                                            <td class="text-center">
                                                <?php if ($row['status'] == 1) : ?>
                                                    <a class="btn btn-sm btn-success" href="{{route("fix_category",["id" => $row['id_categori'],
                                                                                                                    "status" => $row['status']])}}"><i class="fa fa-toggle-on"></i></a>
                                                <?php else : ?>
                                                    <a class="btn btn-sm btn-danger" href="{{route("fix_category",["id" => $row['id_categori'],
                                                                                                                    "status" => $row['status']])}}"><i class="fa fa-toggle-off"></i></a>
                                                <?php endif; ?>
                                                <a class="btn btn-sm btn-danger m-3" href="{{route("delete_category","id=".$row['id_categori'])}}"><i class="fa fa-trash"></i></a>
                                            </td>
                                            <td class="text-center"><?= $row['id_categori']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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