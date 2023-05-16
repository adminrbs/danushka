<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Limitless - Responsive Web Application Kit by Themesbrand</title>
    <link rel="icon" type="image/x-icon" href="{{URL::asset('assets/images/favicon.svg')}}">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/master.css">

    @include('layouts.head-css')

  
</head>

<body>
    <!-- navbar -->
    @include('layouts.navbar')

    @include('layouts.navigation-menu')

    @yield('page-header')

    <!-- Page content -->
    <div class="page-content pt-0" style="background-color: #4b98cf;">

        <!-- Main content -->
        <div class="content-wrapper" style="background-color: #4b98cf;">

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
