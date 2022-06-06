@extends('Admin.layouts.master')
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
    Khách hàng
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="mt-0 header-title">Danh đơn hàng</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Ghi chú</th>
                            <th>Giá bán</th>
                            <th>Trạng thái ship</th>
                            <th>Trạng thái thanh toán</th>
                            <th>Trạng thái</th>
                            <th>Ngày đặt hàng</th>
                        </tr>
                    </thead>


                    <tbody>
                        <tr>
                            <td>Phạm Quỳnh</td>
                            <td>quynhntps11839@fpt.edu.vn</td>
                            <td>Quận 1, Tp Hồ Chí Minh</td>
                            <td>0387618200</td>
                            <td>Giao giờ hành chính</td>
                            <td>200,000vnđ</td>
                            <td>Đang vận chuyển</td>
                            <td>Chưa thanh toán</td>
                            <td>Chưa hoàn thành</td>
                            <td>19-12-2022</td>
                        </tr>
                        <tr>
                            <td>Phạm Tiền Thưởng</td>
                            <td>thuongptps11578@fpt.edu.vn</td>
                            <td>Hà Thị Khiêm, Trung Mỹ Tây, Quận 12, Tp Hồ Chí Minh</td>
                            <td>0387618200</td>
                            <td>Giao giờ hành chính</td>
                            <td>1,200,000vnđ</td>
                            <td>Đang lấy hàng</td>
                            <td>Đã thanh toán</td>
                            <td>Chưa hoàn thành</td>
                            <td>4-4-2022</td>
                        </tr>
                        <tr>
                            <td>Nguyễn Đình Duy</td>
                            <td>duydnps13528@fpt.edu.vn</td>
                            <td>Quận 3, Tp Hồ Chí Minh</td>
                            <td>0855839453</td>
                            <td>Giao giờ hành chính</td>
                            <td>800,000vnđ</td>
                            <td>Đã giao</td>
                            <td>Đã thanh toán</td>
                            <td>Hoàn thành</td>
                            <td>12-6-2022</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end row -->
@endsection
