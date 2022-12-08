<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'JIRAHI') }} | @yield('title', $page_title ?? '')</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  @stack('css')
</head>
<body class="hold-transition sidebar-mini layout-footer-fixed layout-navbar-fixed layout-fixed sidebar-collapse">
  <div class="wrapper">
    @include('layouts.blocks.nav')
    @include('layouts.blocks.aside')
    <div class="content-wrapper">
      @yield('content')
    </div>
    @include('layouts.blocks.footer')
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>
  <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
  <script src="{{asset('assets/dist/js/demo.js')}}"></script>

  @stack('js')
  @stack('jscripts')
</body>
</html>
