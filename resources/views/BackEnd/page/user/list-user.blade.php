@extends('layout.master-layout-admin')

@section('link_css')
    
@endsection

@section('link_js')
   
@endsection

@section('admin-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
    <?php
            $message = Session::get('message');
            if (isset($message)) {
                echo '<p class=" text-muted  style="color:green; margir-left:30px; front-size:20px""> <strong>Thông báo : </strong>'.$message.'</p>';
                Session::put('message',null);
            }else {
                echo '<p class="text-muted mb-4 mt-3">.</p>';
            } 

   ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title font-weight-bold py-2">Danh sách users</h3>
                                <div class="card-tools">
                                    <a class="btn btn-primary" href="{{route("add_users")}}">
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
                                        <th class="text-left" width="">Vị Trí</th>
                                  
                                        <th class="text-center" width="150px">Chức năng</th>
                                
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $key => $row) : ?>
                                     {{-- @dd($row) --}}
                                        <tr>
                                            <td class="text-left">
                                                <input type="checkbox" name="checkid[]" value="<?= $row['id']; ?>">
                                            </td>
                                            <td class="text-center">
                                                <div class="carousel slide" data-ride="carousel" style="margin: 0 auto">
                                                    <div class="carousel-inner " style="margin: 0 20%">
                                                        <img src="{{asset('public/FrontEnd/img/user/'.$row->image.'')}}" class="d-block" style="height: 100px; border-radius:20px " alt="Image">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-left">
                                                Name:<br> <?= $row['name']; ?> <br><br>
                                                email :<br> <?= $row['email']; ?><br><br>
                                                                     
                                            </td>
                                            <td class="text-left"><?= $row['rule'] == 1 ? "Admin" : "User" ?></td>
                                            
                                            <td class="text-center">
                                                <?php if ($row['rule'] == 1) : ?>
                                                    <a class="btn btn-sm btn-success" href="{{route("rule_edit","id=".$row['id'])}}"><i class="fa fa-toggle-on"></i></a>
                                                <?php else : ?>
                                                    <a class="btn btn-sm btn-danger" href="{{route("rule_edit","id=".$row['id'] )}}"><i class="fa fa-toggle-off"></i></a>
                                                <?php endif; ?>
                                                <a class="btn btn-sm btn-danger" href="{{route("delete_users", "id=".$row['id'])}}"><i class="fa fa-trash"></i></a>
                                            </td>
                                         
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            {{$users->links()}}
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