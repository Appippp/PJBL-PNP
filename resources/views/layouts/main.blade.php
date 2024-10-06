<!DOCTYPE html>
<html>

<head>


    @include('includes.backsite.meta')

    <title>BACKOFFICE | @yield('title')</title>

    @stack('before-style')
        @include('includes.backsite.style')
    @stack('after-style')

</head>

<body class="hold-transition skin-blue sidebar-mini">

    <!-- Site wrapper -->
    <div class="wrapper">

        <!-- sweet alert -->
        @include('sweetalert::alert')

        <!-- Header -->
        @include('components.backsite.header')
        <!-- end header -->

        <!-- Menu -->
        @include('components.backsite.menu')
        <!-- end menu -->

        <!-- content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- end content -->

        @include('components.backsite.footer')


        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->

    @stack('before-script')
        @include('includes.backsite.script')
    @stack('after-script')

</body>

</html>
