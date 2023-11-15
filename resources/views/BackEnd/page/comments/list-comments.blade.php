@extends('layout.master-layout-admin')

@section('link_css')
    
@endsection

@section('link_js')
   
@endsection

@section('admin-content')
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
                                <th class="text-center" width="50%">film</th>
                                <th class="text-center" width="50%">Comment</th>
                            </tr>
                        </thead>
                        
                                        
                        </div>
                        <tbody>
                            <?php foreach ($film as $key=>$row) : ?>
                                <tr>
                                    <td class="text-center">
                                        <img src="{{asset('public/FrontEnd/img/film/'.$row->film_image.'')}}" width="200px" height="150px" alt="">
                                       <div> <?= $row['film_name']; ?></div>
                                    </td>       
                                    <td>
                                        @foreach ($row->comments as $item)
                                       
                                            <div class="anime__review__item" style="display: flex; margin: 10px 0; overflow-x: hidden;" >
                                                <div class="anime__review__item__pic">
                                                    <img src="{{asset('public/FrontEnd/img/user/'.$item->image.'')}}" alt="" style="border: 1px solid; border-radius:30px; margin-right: 10px;height: 36px; " >
                                                </div>
                                                <div class="anime__review__item__text">
                                                    <h6 >{{$item->name}}.  <span style="font-size:10px "> {{\Carbon\Carbon::parse($item->date)->format('d-m-Y') }} </span></h6>
                                                    <p style="margin-top: 10px; background-color: rgb(202, 235, 235); border-radius: 5px;padding: 2px 5px">{{$item->content}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            {{-- @dd($film->links()) --}}
                           
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
<div class="text-center" id="show_comment">
@endsection
