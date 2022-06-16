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
Danh sách đơn hàng
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 header-title">Danh sách đơn hàng</h4>
            <ul style="list-style: none" class="pl-0">
                <li class="float-left pr-1"><a style="color: mediumvioletred;" href="#">Tất cả <span class="text-dark font-weight-bold">(5)</span> |</a></li>
                <li class="float-left pr-1"><a style="color: mediumvioletred;" href="#">Đơn đã chuyển <span class="text-dark font-weight-bold">(6)</span> |</a></li>
                <li class="float-left pr-1"><a style="color: mediumvioletred;" href="#">Đơn đang chuyển <span class="text-dark font-weight-bold">(7)</span> |</a></li>
                <li class="float-left pr-1"><a style="color: mediumvioletred;" href="#">Đơn đang chờ <span class="text-dark font-weight-bold">(8)</span> |</a></li>
                <li class="float-left pr-1"><a style="color: mediumvioletred;" href="#">Đơn đã hủy <span class="text-dark font-weight-bold">(9)</span> </a></li>
            </ul><br>
            <div class="actions">
                <select name="actions" style="border: 1px solid #ccc;
    padding: 4px 10px;
    border-radius: 3px;">
                    <option>Tác vụ</option>
                    <option value="1">1. Xác nhận đơn hàng</option>
                    <option value="2">2. Gỡ, tạm chỉnh sửa</option>
                    <option value="3">3. Kết thúc đơn hàng</option>
                </select>
                <input type="submit" name="sm_action" value="Áp dụng" style="border-radius: 3px;
    border: 1px solid #afafaf;
    padding: 2px 15px;
    background: #fafafa;">
            </div><br>
            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="checkAll" id="checkAll">
                        </th>
                        <th>Stt</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Ghi chú</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Ngày đặt hàng</th>
                        <th>Xem chi tiết</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>
                            <input type="checkbox" name="checkItem[]">
                        </td>
                        <td>1</td>
                        <td>{{$order->m_name}}</td>
                        <td>{{$order->m_email}}</td>
                        <td>{{$order->m_address}}</td>
                        <td>{{$order->m_phone}}</td>
                        <td>{{$order->m_note}}</td>
                        <td>{{$order->m_total_price}}</td>
                        <td>Đang chuyển</td>
                        <td>{{$order->created_at}}</td>
                        <td><a href="{{route('order.detail')}}">
                                <i class="fas fa-file"></i>
                            </a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
@endsection