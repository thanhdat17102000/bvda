@extends('admin.index')
@push('styles')
@endpush
@push('scripts')
    <script src=https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js></script>
    <script>
    jQuery(document).ready(function($) {
        var colorDanger = "#FF1744";
          var donut = Morris.Donut({
            element: 'donut',
            resize: true,
            colors: [
                '#5ddab4',
                '#9694ff',
                '#80DEEA',
                '#4DD0E1',
                '#00ACC1',
                '#0097A7',
                '#00838F',
                '#006064'
            ],
            //labelColor:"#cccccc", // text color
            //backgroundColor: '#333333', // border color
            data: [
                {label:"đánh giá 5*", value:<?php echo $cmtproduct5sao ?>},
                {label:"đánh giá 4*", value:<?php echo $cmtproduct4sao ?>},
                {label:"đánh giá 3*", value:<?php echo $cmtproduct3sao ?>},
                {label:"đánh giá 2*", value:<?php echo $cmtproduct2sao ?>},
                {label:"đánh giá 1*", value:<?php echo $cmtproduct1sao ?>},
            ]
        });
    });
</script>
@endpush
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">

                <div class="col-xl-3 col-md-6">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4">Tổng sản phẩm</h4>

                        <div class="widget-chart-1">
                            <!-- <div class="widget-chart-box-1 float-left" dir="ltr">
                                <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                                    data-bgColor="#F9B9B9" value="58" data-skin="tron" data-angleOffset="180"
                                    data-readOnly=true data-thickness=".15" />
                            </div> -->

                            <div class="widget-detail-1 text-right">
                                <h2 class="font-weight-normal pt-2 mb-1"> {{$tongsanpham->count()}}</h2>
                                <p class="text-muted mb-1">Sản phẩm</p>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4">Tổng danh mục</h4>

                        <div class="widget-chart-1">
                            <!-- <div class="widget-chart-box-1 float-left" dir="ltr">
                                <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                                    data-bgColor="#F9B9B9" value="58" data-skin="tron" data-angleOffset="180"
                                    data-readOnly=true data-thickness=".15" />
                            </div> -->

                            <div class="widget-detail-1 text-right">
                                <h2 class="font-weight-normal pt-2 mb-1"> {{$tongdanhmuc->count()}}</h2>
                                <p class="text-muted mb-1">Danh mục</p>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4">Đơn hàng trong 30 ngày</h4>

                        <div class="widget-chart-1">
                            <!-- <div class="widget-chart-box-1 float-left" dir="ltr">
                                <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ffbd4a"
                                    data-bgColor="#FFE6BA" value="80" data-skin="tron" data-angleOffset="180"
                                    data-readOnly=true data-thickness=".15" />
                            </div> -->
                            <div class="widget-detail-1 text-right">
                                <h2 class="font-weight-normal pt-2 mb-1"> {{$tongdonhang->count()}} </h2>
                                <p class="text-muted mb-1">30 ngày</p>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4">Tổng đánh giá</h4>

                        <div class="widget-chart-1">
                            <!-- <div class="widget-chart-box-1 float-left" dir="ltr">
                                <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ffbd4a"
                                    data-bgColor="#FFE6BA" value="80" data-skin="tron" data-angleOffset="180"
                                    data-readOnly=true data-thickness=".15" />
                            </div> -->
                            <div class="widget-detail-1 text-right">
                                <h2 class="font-weight-normal pt-2 mb-1"> {{$cmtproduct->count()}} </h2>
                                <p class="text-muted mb-1">Đánh giá</p>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->


            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-8">
                    <div class="card-box">
                    <form autocomplete="off" class="card-body">
                        @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <p>Từ ngày<input type="text" id="datepicker" class="form-control"></p>
                        </div>
                        <div class="col-md-3">
                            <p>Đến ngày <input type="text" id="datepicker2" class="form-control"></p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <input type="button" id="btn-dashboard-filter" class="btn btn-info btn-sm" value="lọc kết quả">
                        </div>
                    </div>
                    </form>
                        <h4 class="header-title mt-0">Thống kê đơn hàng</h4>

                        <div class="widget-chart text-center">
                            <div id="myfirstchart" style="height:250px;"></div>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4">
                    <div class="card-box">
                        <h4 class="header-title mt-0">thống kê đánh giá</h4>
                        <div id="donut" class="morris-donut-inverse" style="height:373px">

                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-4">
                    <div class="card-box">
                        <h4 class="header-title mb-3">Đánh giá gần đây</h4>

                        <div class="inbox-widget">
                            @foreach($showcmtganday as $show)
                            <div class="inbox-item">
                                <a href="#">
                                    <div class="inbox-item-img">
                                        @if($show->showiduser->m_avatar != null)
                                        <img src="{{asset('uploads/avatar')}}/{{$show->showiduser->m_avatar}}" class="rounded-circle" alt="">
                                        @else
                                        <img src="{{asset('admin/assets/images')}}/users/user-4.jpg" class="rounded-circle" alt="">
                                        @endif
                                    </div>
                                    <h5 class="inbox-item-author mt-0 mb-1">{{$show->showiduser->name}}</h5>
                                    <p class="inbox-item-text">{{$show->m_content}}</p>
                                    <p class="inbox-item-date">{{$show->updated_at->diffForHumans()}}</p>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-xl-8">
                    <div class="card-box">
                        <h4 class="header-title mt-0 mb-3">Đơn hàng gần đây</h4>

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Người đặt hàng</th>
                                        <th>Thời gian Đặt</th>
                                        <th>Số điện thoại</th>
                                        <th>Tình trạng</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($showdonhangganday as $key => $showdh)
                                    <tr>
                                        <td>{{$key+=1}}</td>
                                        <td>{{$showdh->showuser->name}}</td>
                                        <td>{{$showdh->updated_at}}</td>
                                        <td>{{$showdh->m_phone}}</td>
                                        <td>
                                            @if($showdh->m_status == 0)
                                            <span class="badge badge-info">chưa hoàn thành</span>
                                            @elseif($showdh->m_status == 1)
                                            <span class="badge badge-warning">Đang vận chuyển</span>
                                            @elseif($showdh->m_status == 2)
                                            <span class="badge badge-dark">đã được giao</span>
                                            @elseif($showdh->m_status == 3)
                                            <span class="badge badge-danger">Đơn đã hủy</span>
                                            @elseif($showdh->m_status == 4)
                                            <span class="badge badge-success">Hoàn thành đơn</span>
                                            @endif
                                        </td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end col -->

            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    2016 - 2020 &copy; Adminto theme by <a href="">Coderthemes</a>
                </div>
                <div class="col-md-6">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript:void(0);">About Us</a>
                        <a href="javascript:void(0);">Help</a>
                        <a href="javascript:void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->


@endsection
