
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="utf-8">
    <title>Dashboard | Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
        content="A fully featured admin theme which can be used to build CRM, CMS, etc., Tailwind, TailwindCSS, Tailwind CSS 3"
        name="description">
    <meta content="Coderthemes" name="author">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('dashboard_assets/images/favicon.ico') }}">

    <!-- plugin css -->
    <link href="{{ asset('dashboard_assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet"
        type="text/css">

    <!-- App css -->
    <link href="{{ asset('dashboard_assets/css/app.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Icons css -->
    <link href="{{ asset('dashboard_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Theme Config Js -->
    <script src="{{ asset('dashboard_assets/js/config.js') }}"></script>

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>

    <div class="flex wrapper">

        <!-- Sidenav Menu -->
      @include('partials.user.sidebar')
        <!-- Sidenav Menu End  -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            <!-- Topbar Start -->
          @include('partials.user.topbar')
            <!-- Topbar End -->

          <main>
            @yield('content')
          </main>

            <!-- Footer Start -->
           @include('partials.user.footer')
            <!-- Footer End -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>



    <!-- Plugin Js -->
    <script src="{{ asset('dashboard_assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/libs/lucide/umd/lucide.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/libs/%40frostui/tailwindcss/frostui.js') }}"></script>

    <!-- App Js -->
    <script src="{{ asset('dashboard_assets/js/app.js') }}"></script>

    <!-- Apex Charts js -->
    <script src="{{ asset('dashboard_assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector Map Js -->
    <script src="{{ asset('dashboard_assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/libs/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ asset('dashboard_assets/libs/jsvectormap/maps/world.js') }}"></script>

    <!-- Dashboard App js -->
    <script src="{{ asset('dashboard_assets/js/pages/dashboard.js') }}"></script>

</body>

</html>