<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RBS</title>
    <link rel="icon" type="image/x-icon" href="{{URL::asset('assets/images/logo_icon.svg')}}">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/master.css">
    <script src="{{URL::asset('assets/js/toast.min.js')}}"></script>


    @include('layouts.head-css')

    <style>


    </style>
    
</head>

<body>
    <!-- navbar -->
    <div class="fixed-top">
        @include('layouts.navbar')

        @include('layouts.navigation-menu')
    </div>

    @yield('page-header')

    <!-- Page content -->
    <div class="page-content pt-0" style="background-color: #4b98cf;">

        <!-- Main content -->
        <div class="content-wrapper" style="background-color: #4b98cf;">

            <div class="toast fade position-fixed" data-bs-delay="800" role="alert" aria-live="assertive" aria-atomic="true" style="margin: auto;">
                <div class="toast-body d-flex">
                    <div class="flex-fill toast-msg">
                        Hello, world! This is a toast message.
                    </div>

                    <button type="button" class="btn-close flex-shrink-0 ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>

            @yield('content')

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

    @include('layouts.footer')

    <!-- notification -->
    @include('layouts.notification')

    <!-- right-sidebar content -->
    @include('layouts.right-sidebar')

</body>

</html>