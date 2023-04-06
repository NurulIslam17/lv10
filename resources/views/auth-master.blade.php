<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/vertical/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Sep 2020 15:08:04 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Login | Nurul</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ asset('dash_board') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('dash_board') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('dash_board') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="home-btn d-none d-sm-block">
        <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            @yield('main')
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('dash_board') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('dash_board') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dash_board') }}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('dash_board') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('dash_board') }}/assets/libs/node-waves/waves.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
</body>

</html>
