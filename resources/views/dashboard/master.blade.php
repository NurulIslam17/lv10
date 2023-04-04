<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Sep 2020 15:06:42 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Dashboard | LV-10</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- _______________________________________App favicon_______________________________________ -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- ______________________________________Responsive datatable examples______________________________________ -->
    <link href="{{ asset('dash_board') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    {{-- ______________________________________data table______________________________________ --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <!-- ______________________________________Bootstrap Css______________________________________ -->
    <link href="{{ asset('dash_board') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- ______________________________________Icons Css______________________________________ -->
    <link href="{{ asset('dash_board') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- ______________________________________App Css______________________________________-->
    <link href="{{ asset('dash_board') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    @stack('css')

</head>

<body data-sidebar="dark">

    <!-- ______________________________________________Begin page______________________________________________ -->
    <div id="layout-wrapper">
        @include('dashboard.partials.header')
        @include('dashboard.partials.sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('main')
                </div>
            </div>
            @include('dashboard.partials.footer')
        </div>
    </div>
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title px-3 py-4">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>
            <hr class="mt-0" />
            <h6 class="text-center mb-0">Choose Layouts</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="{{ asset('dash_board') }}/assets/images/layouts/layout-1.jpg"
                        class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                    <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('dash_board') }}/assets/images/layouts/layout-2.jpg"
                        class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch"
                        data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                    <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('dash_board') }}/assets/images/layouts/layout-3.jpg"
                        class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-5">
                    <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch"
                        data-appStyle="assets/css/app-rtl.min.css" />
                    <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                </div>


            </div>

        </div>
    </div>

    <div class="rightbar-overlay"></div>

    <!-- __________JAVASCRIPT__________________ -->
    <script src="{{ asset('dash_board') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('dash_board') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dash_board') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('dash_board') }}/assets/libs/node-waves/waves.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('js')
</body>

</html>
