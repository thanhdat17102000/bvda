<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin.components.title-meta')

    @include('Admin.components.head-css')

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        @include('Admin.components.topbar')
        @include('Admin.components.left-sidebar')

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    @yield('content')

                </div> <!-- container-fluid -->

            </div> <!-- content -->

            @include('Admin.components.footer')

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    {{-- @include('Admin.components.right-sidebar') --}}

    @include('Admin.components.body-js')

</body>

</html>
