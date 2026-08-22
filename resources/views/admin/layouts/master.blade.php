<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link rel="icon" href="{{ isset($siteseting->fave_icon) ? asset('upload/site-setting/' . $siteseting->fave_icon) : asset('favicon.ico') }}">

        <!--=====|| ADMIN ALL CSS ||=====-->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/dashboard_min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">

        <!--=====|| INCLUDE (FRONT PART):- FONT AWSOME / FONTS ||=====-->
        <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
            
            <!--=====|| ADMIN HEADER ||=====-->
            @include('admin.layouts.header')
            
            <div class="app-main">

                <!--=====|| ADMIN SIDEBAR ||=====-->
                @include('admin.layouts.menu') 
                  
                <!--=====|| ADMIN CONTENT ||=====-->
                @yield('admin_content')
 
            </div>
        </div>

        <!--=====|| ADMIN ALL JS ||=====-->
        <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin/js/dashboard_min.js') }}"></script>
        <script src="{{ asset('admin/js/bootbox.js') }}"></script>
        <script src="{{ asset('admin/js/dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/js/custom.js') }}"></script>
        <script src="{{ asset('admin/js/chart.js') }}"></script>
        <script src="{{ asset('admin/js/toastr.min.js') }}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        <!--=====|| LANGUAGE SELECTOR ||=====-->
        <script>
            var url = "{{ route('admin.lang.change') }}";
            $('.language_select').change(function() {
                let lang_code = $(this).val();
                window.location.href = url + "?lang=" + lang_code;
            });
        </script>
        @yield('script')
    </body>
</html>