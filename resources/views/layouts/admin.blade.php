<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="utf-8">
    <title>Dashboard || Admin Dashboard</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link href="{{ asset('dashboard_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Theme Config Js -->
    <script src="{{ asset('dashboard_assets/js/config.js') }}"></script>

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
</head>

<body>

    <div class="flex wrapper">

        <!-- Sidenav Menu -->
      @include('partials.admin.sidebar')
        <!-- Sidenav Menu End  -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            <!-- Topbar Start -->
          @include('partials.admin.topbar')
            <!-- Topbar End -->

          @yield('content')

            <!-- Footer Start -->
            <footer class="footer h-16 flex items-center px-6 bg-white shadow dark:bg-gray-800 mt-auto">
                <div class="flex md:justify-between justify-center w-full gap-4">
                    <div>
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Attex - <a href="https://coderthemes.com/"
                            target="_blank">Coderthemes</a>
                    </div>
                    <div class="md:flex hidden gap-4 item-center md:justify-end">
                        <a href="javascript: void(0);"
                            class="text-sm leading-5 text-zinc-600 transition hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white">About</a>
                        <a href="javascript: void(0);"
                            class="text-sm leading-5 text-zinc-600 transition hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white">Support</a>
                        <a href="javascript: void(0);"
                            class="text-sm leading-5 text-zinc-600 transition hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white">Contact
                            Us</a>
                    </div>
                </div>
            </footer>
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


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    @if (session('success') || session('error') || session('info') || session('warning'))
<script>
        // iziToast Messages
        @if (session('success'))
            iziToast.success({
                title: 'Success',
                message: @json(session('success')),
                position: 'topRight',
                timeout: 5000
            });
        @elseif (session('error'))
            iziToast.error({
                title: 'Error',
                message: @json(session('error')),
                position: 'topRight',
                timeout: 5000
            });
        @elseif (session('info'))
            iziToast.info({
                title: 'Info',
                message: @json(session('info')),
                position: 'topRight',
                timeout: 5000
            });
        @elseif (session('warning'))
            iziToast.warning({
                title: 'Warning',
                message: @json(session('warning')),
                position: 'topRight',
                timeout: 5000
            });
        @endif

        </script>
    @endif
       
    </script>
</body>

</html>