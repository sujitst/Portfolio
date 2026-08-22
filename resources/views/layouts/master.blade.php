<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <title>{{ config('app.name') }}</title>
        <link rel="icon" href="{{ isset($siteseting->fave_icon) ? asset('upload/site-setting/' . $siteseting->fave_icon) : asset('favicon.ico') }}">

        <!--=====|| ALL CSS ||=====-->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/fancybox.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

        <!--=====|| FONT AWSOME ||=====-->
        <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/font-awesome.min.css') }}">

        <!--=====|| OWL CAROUSEL ||=====-->
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}"/>

        <!--====|| COUNTRY CODE SELECTION ||=====-->
        <link rel="stylesheet" href="{{ asset('assets/css/intlTelInput.css') }}">

        <!--=====|| GOOGLE FONTS ||=====-->
        <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
    </head>
    <body>
        
        <!--=====|| OVERLAY ||=====-->
        <div id="overlay"></div>

        <!--=====|| MAIN CONTENT ||=====-->
        @yield('content')

        <!--====|| ALL JS ||=====-->
        <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/js/fancybox.umd.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>

        <!--====|| OWL CAROUSEL JS ||=====-->
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

        <!--====|| COUNTRY CODE SELECTION ||=====-->
        <script src="{{ asset('assets/js/intlTelInput-jquery.min.js') }}"></script>
        <script>
            $("#mobile_code").intlTelInput({
                initialCountry: "bd",
                separateDialCode: true,
            });
        </script>

        <!--====|| LOCLIZATION JS ||=====-->
        <script>
            var url = "{{ route('lang.change') }}";

            $('.language_select').change(function() {
                let lang_code = $(this).val();
                window.location.href = url + "?lang=" + lang_code;
            });
        </script>
    </body>
</html>