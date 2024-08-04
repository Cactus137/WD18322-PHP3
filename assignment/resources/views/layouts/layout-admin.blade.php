<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/dashboards/img/apple-icon.png') }}" />
    <link rel="icon" href="{{ asset('assets/img/favicon.jpg') }}" />
    <title>VnNews</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/dashboards/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dashboards/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="{{ asset('assets/dashboards/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />
</head>

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>

    <!-- sidenav  -->
    @include('partials.admins.sidenav')
    <!-- end sidenav -->

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <!-- cards -->
        @yield('content')
        <!-- end cards -->
    </main>

</body>
<!-- plugin for charts  -->
<script src="{{ asset('assets/dashboards/js/plugins/chartjs.js') }}"></script>
<!-- plugin for scrollbar  -->
<script src="{{ asset('assets/dashboards/js/plugins/perfect-scrollbar.js') }}"></script>
<!-- main script file  -->
<script src="{{ asset('assets/dashboards/js/argon-dashboard-tailwind.js?v=1.0.1') }}"></script>

@yield('scripts')

</html>
