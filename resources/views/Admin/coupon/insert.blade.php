@extends('admin.index')
@push('styles')
    <link href=" {{ asset('admin/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script src=" {{ asset('admin/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src=" {{ asset('admin/assets/libs/moment/moment.js') }}"></script>
    <script>
        $("#datepicker-autoclose").datepicker({
                format: "yyyy/mm/dd",
                autoclose: !0,
                todayHighlight: !0,
            }),
            $(".select2").select2()
        $('#form-insert').submit(function(e) {
            e.preventDefault();
            let data = new FormData(this);
            // let date = new Date($('input[name=coupon_expired]').val());
            // data.set('coupon_expired', moment(date).format('YYYY/MM/DD'))
            $.ajax({
                type: "post",
                url: "{{ route('save-coupon') }}",
                data,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    toastr.success('Thêm mã giảm giá thành công!')
                    $('button[type=reset]').click();
                },
                error: function(error) {
                    console.error(error);
                    toastr.error('Lỗi thêm mã giảm giá!')
                }
            });
        });
    </script>
@endpush
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                    <form class="form-horizontal" id="form-insert" role="form" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Tên mã giảm giá</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập tên mã giảm giá" name="coupon_name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Mã giảm giá</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Nhập mã giảm giá"
                                                    name="coupon_code">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Số lượng mã</label>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" placeholder="Nhập số lượng"
                                                    name="coupon_time">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Phương thức giảm giá</label>
                                            <div class="col-md-10">
                                                <select class="form-control select2" name="coupon_method">
                                                    <option value="">-- Chọn phương thức --</option>
                                                    <option value="1">Giảm theo phần trăm</option>
                                                    <option value="2">Giảm theo số tiền</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Ngày hết hạn</label>
                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="coupon_expired"
                                                        placeholder="yyyy/mm/dd" id="datepicker-autoclose">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="ti-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Giá trị mã</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Nhập giá trị mã"
                                                    name="coupon_value">
                                            </div>
                                        </div>
                                        <div class="form-group text-right mb-0">
                                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                                Thêm mã
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                                Hủy
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->

                    </div> <!-- end card-box -->
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
@endsection
