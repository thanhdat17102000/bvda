@extends('admin.index')
@section('content')
<style>
    #container {
        display: flex;
    }

    a {
        color: #fff;
        text-decoration: none;
    }

    button:hover>a {
        color: #fff;
        text-decoration: none;
    }

    .avt {
        width: 40px;
        height: 40px;
        margin-right: 20px;
        border: none;
        border-radius: 40px;

    }
    .avt img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        overflow: hidden;
        border-radius: 40px;
        box-shadow: 2px 3px 4px gray;
    }
</style>
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title"> Quản lí bình luận <span class="badge badge-danger"><?php echo count($query); ?></span>
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <table id="datatable" class="table table-bordered dt-responsive nowrap">
                    <thead style="text-align:center;">
                        <tr>
                            <th>KHÁCH HÀNG</th>
                            <th with="40%">NỘI DUNG</th>
                            <th>ID SẢN PHẨM</th>
                            <th with="10%">NGÀY BÌNH LUẬN</th>
                            <th>DUYỆT</th>
                            <th>TRẢ LỜI</th>
                            <th>XÓA</th>
                        </tr>
                    </thead>


                    <tbody id="output">
                        @php
                        if(isset($query)) {
                        foreach($query as $row) {
                        @endphp
                        <tr>
                            <td>
                                {{$row->name}}
                            </td>
                            <td>
                                <span>
                                    @php
                                    $str = $row->m_content;
                                    $ct = substr($str, 0,30);
                                    $ct .= '....';
                                    echo $ct;
                                    @endphp
                                </span>
                                <button type='button' value="{{$row->idbl}}"   class='get_value btn btn-primary float-right' style='outline: none;' data-toggle='modal' data-target='#exampleModal'>
                                    Xem
                                </button>
                            </td>
                            <td>
                                <span style='color:red'>ID : {{$row->m_id_maloai}}</span></br>
                                {{$row->m_product_name}}
                            </td>
                            <td with='10%'>
                                {{$row->ngaybinhluan}}
                            </td>
                            <td>
                                <button class='btn @php if($row->m_status ==1) {echo "btn-primary";} else {echo "btn-warning";}@endphp style=' outline: none;'>
                                    @php if($row->m_status ==1) {echo "Đã Duyệt";} else {echo "Duyệt";} @endphp
                                </button>
                            </td>
                            <td>
                                <button type='button' value="" @php if($row->m_status ==0) echo "disabled"; @endphp class='btn btn-secondary' style='outline: none;' data-toggle='modal' data-target='#exampleModal1'>
                                    Trả lời
                                </button>
                            </td>
                            <td>
                                <button class='btn btn-danger' style='outline: none;' id>
                                    <a href="{{url('admintrator/delete_cmt')}}/{{$row->idbl}}">Xóa</a>
                                </button>
                            </td>
                        </tr>
                        @php
                        }
                        }
                        @endphp
                    </tbody>

                </table>
                {{$query->links();}}

            </div>
        </div>
    </div>
    <!-- end row -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        KHÁCH HÀNG : <span id="id_user"></span> </br>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="content_user">
                       
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="outline:none;" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span style="color:red">Khách Hàng</span> <span ></span></br>
                        Nội dung : <span></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3>TRẢ LỜI BÌNH LUẬN</h3>
                    <form method="post" action="">
                        <div class="form-group">
                            <textarea class="form-control" name="data_cmt" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" name="send_cmt" class="btn btn-primary">GỬI</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="outline:none;" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- start model -->

</div> <!-- container-fluid -->
@push('scripts')
 <script src="{{URL::asset('admin/assets/js/jquery/jquery-3.6.0.min.js')}}"></script>
 <script src="{{URL::asset('admin/assets/js/jquery/load_model.js')}}"></script>
@endpush
@endsection