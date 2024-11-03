@include('admin.layouts.header')

<body class="  "  style="background:{{ url('../admin_panel/assets/images/dashboard.png') }}    background-attachment: fixed;
    background-size: cover;">

    @include('admin.layouts.loading')

    @include('admin.layouts.side')

    <main class="main-content col-md-11" style="margin-left: 11%;">
        <div class="position-relative">
          <!--Nav Start-->
          @include('admin.layouts.nav')
        </div>


        @yield('content')


@include('admin.layouts.footer')
