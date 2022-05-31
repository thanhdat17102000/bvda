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
    Tin tức
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 header-title">Danh sách tin</h4>

            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Ngày đăng</th>
                        <th>Tóm tắt</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>111</td>
                        <td>Real Madrid vô định C1 2021/2022</td>
                        <td>2011/04/25</td>
                        <td>Real Madrid vượt qua Liverpool để giành chức vô địch Cúp C1, HLV Ancelotti liên tiếp lập kỷ lục vô tiền khoáng hậu chỉ trong vòng một tháng.</td>
                        <td><input type="checkbox"></td>
                        <td>
                            <button>Xem</button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
@endsection
