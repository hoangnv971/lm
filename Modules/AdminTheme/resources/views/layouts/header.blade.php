<head>
  <title>{{env('APP_NAME')}} | @yield('title')</title>
  @vite(['Modules/AdminTheme/resources/assets/sass/app.scss'])
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous">
  @stack('header')
</head> <!--end::Head--> <!--begin::Body-->