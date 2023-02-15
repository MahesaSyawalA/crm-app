<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>CRM Pop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/favicon.ico') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/libs/select2/css/select2.min.css') }}">
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/libs/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/fontawesome/css/brands.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/fontawesome/css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/fontawesome/css/regular.min.css') }}">
    <!-- Boxicons -->
    <link rel="stylesheet" href="{{ asset('assets/libs/boxicons/css/boxicons.min.css') }}">

    <!-- JQuery -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- Navbar -->
        <x-layouts.navbar></x-layouts.navbar>
        <!-- Sidebar -->
        <x-layouts.sidebar></x-layouts.sidebar>

        <div class="main-content">
            <!-- Main -->
            <div class="page-content">
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </div>
            <!-- Footer -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy PMJ Smart - CRM.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Basicteknologi
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- End Page -->

    <!-- Rightbar -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>

    <!-- Custom js -->
    <script src="{{ asset('assets/js/vendor.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script>
        $('select.select2').select2();
    </script>
</body>

</html>
