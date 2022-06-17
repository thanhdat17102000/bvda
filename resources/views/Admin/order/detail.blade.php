@extends('Admin.index')
@push('css')
<!-- third party css -->
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<!-- third party css end -->
@endpush
@push('scripts')
<!-- third party js -->
<script src=" {{ asset('admin/assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src=" {{ asset('admin/assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
<script src=" {{ asset('admin/assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src=" {{ asset('admin/assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src=" {{ asset('admin/assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
<script src=" {{ asset('admin/assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src=" {{ asset('admin/assets/libs/datatables/buttons.html5.min.js') }}"></script>
<script src=" {{ asset('admin/assets/libs/datatables/buttons.flash.min.js') }}"></script>
<script src=" {{ asset('admin/assets/libs/datatables/buttons.print.min.js') }}"></script>
<script src=" {{ asset('admin/assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
<script src=" {{ asset('admin/assets/libs/datatables/dataTables.select.min.js') }}"></script>
<script src=" {{ asset('admin/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src=" {{ asset('admin/assets/libs/pdfmake/vfs_fonts.js') }}"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script src=" {{ asset('admin/assets/js/pages/datatables.init.js') }}"></script>
@endpush
@section('title')
Thông tin đơn hàng
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h2 class="mt-0 header-title">THÔNG TIN ĐƠN HÀNG</h2><br>
            <ul class="list-item" style="list-style: none; font-size: 16px; padding-left: 0px">
                <li>
                    <h3 style="font-size: 16px;" class="title"><i class='fas fa-barcode' style='font-size:24px'></i> Mã đơn hàng</h3>
                    <span class="detail">l32</span>
                </li>
                <li>
                    <h3 style="font-size: 16px;" class="title"><i class='fas fa-map-marker-alt' style='font-size:24px;'></i> Địa chỉ nhận hàng</h3>
                    <span class="detail">Quận 12, Tp Hồ Chí Minh</span>
                </li>
                <li>
                    <h3 style="font-size: 16px;" class="title"><i class='fas fa-phone' style='font-size:24px'></i> Số điện thoại</h3>
                    <span class="detail">0938623679</span>
                </li>
                <li>
                    <h3 style="font-size: 16px;" class="title"><i class='fas fa-rocket' style='font-size:24px'></i> Thông tin vận chuyển</h3>
                    <span class="detail">Payment-bank</span>
                </li>
                <form method="POST" action="">
                    <li>
                        <h5 class="title">Tình trạng đơn hàng</h5>
                        <select name="status" style="   border: 1px solid #ccc;
                                                        padding: 5px 20px;
                                                        font-size: 16px;
                                                        color: #666;
                                                        border-radius: 3px;">
                            <option value="none" selected='selected'>Đang chuyển</option>
                            <option value="none">-------------------------------</option>
                            <option value="0">Đang chờ</option>
                            <option value='1'>Đang vận chuyển</option>
                            <option value='2'>Đã chuyển</option>
                            <option value='2'>Đã hủy</option>
                        </select>
                        <button type="submit" class="btn btn-primary" name="sm_status" value="">Cập nhật đơn hàng</button>
                    </li>
                </form><br>
                <li>
                    <a href="">Trở về danh sách đơn hàng</a>
                </li>
            </ul>
        </div>
        <div class="card-box">
            <h4 class="mt-0 header-title">SẢN PHẨM ĐƠN HÀNG</h4>

            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>ẢNH SẢN PHẨM</th>
                        <th>MÃ SẢN PHẨM</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>ĐƠN GIÁ</th>
                        <th>SỐ LƯỢNG</th>
                        <th>THÀNH TIỀN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td style="width: 10px"><img src="{{asset('img/product/pro-small-1.jpg')}}" alt="" style="width: 80px;
                                                                                                                height: 80px;
                                                                                                                border: 1px solid #ccc;">
                        </ td>
                        <td>M95</td>
                        <td>Ớt</td>
                        <td>10.000</td>
                        <td>1</td>
                        <td>10.000đ</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td style="width: 10px"><img src="{{asset('img/product/pro-small-2.jpg')}}" alt="" style="width: 80px;
                                                                                                                height: 80px;
                                                                                                                border: 1px solid #ccc;">
                        </ td>
                        <td>L96</td>
                        <td>Hành tây</td>
                        <td>20.000</td>
                        <td>5</td>
                        <td>100.000đ</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td style="width: 10px"><img src="{{asset('img/product/pro-small-3.jpg')}}" alt="" style="width: 80px;
                                                                                                                height: 80px;
                                                                                                                border: 1px solid #ccc;">
                        </ td>
                        <td>A93</td>
                        <td>Xà lách</td>
                        <td>15.000</td>
                        <td>2</td>
                        <td>30.000đ</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td style="width: 10px"><img src="{{asset('img/product/pro-small-4.jpg')}}" alt="" style="width: 80px;
                                                                                                                height: 80px;
                                                                                                                border: 1px solid #ccc;">
                        </ td>
                        <td>R41</td>
                        <td>Bắp cải</td>
                        <td>86.000</td>
                        <td>4</td>
                        <td>354.000đ</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h4 class="mt-0 header-title">GIÁ TRỊ ĐƠN HÀNG</h4>
            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <p>Tổng số lượng sản phẩm: 12</p>
                <p style="color: red; font-weight: bold">Tổng giá trị đơn hàng: 494.000đ</p>
            </table>
        </div>

    </div>
</div> <!-- end row -->
@endsection