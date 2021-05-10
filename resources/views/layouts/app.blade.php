@extends('layouts.base')

@section('body')
<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">
    @include('includes.main-header')
    @include('includes.main-sidebar')
    @yield('content')
    @include('includes.main-footer')
    <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    </aside>
    </div>
    <!-- BEGIN: JS Assets-->
    <script src="{{ asset('theme/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/dist/js/adminlte.min.js') }}"></script>
    
    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- END: JS Assets-->
    @yield('script')
</body>    
@endsection