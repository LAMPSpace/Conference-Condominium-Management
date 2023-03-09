<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backoffice/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('backoffice/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backoffice/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backoffice/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        {{-- Preloader --}}
        @include('blocks.backoffice.preloader')
        {{-- Header --}}
        @include('blocks.backoffice.header')
        {{-- Sidebar --}}
        @include('blocks.backoffice.sidebar')
        {{-- Content Wrapper --}}
        <div class="content-wrapper">
            {{-- Content Header --}}
            @include('blocks.backoffice.contentheader')
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
            <!-- /.content -->
        </div>
        {{-- Footer --}}
        @include('blocks.backoffice.footer')
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('backoffice/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('backoffice/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backoffice/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('backoffice/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backoffice/js/adminlte.js') }}"></script>
</body>
</html>
