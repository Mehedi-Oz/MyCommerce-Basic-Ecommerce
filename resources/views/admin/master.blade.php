<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin-asset') }}/assets/images/favicon.png">
    <title>Admin - @yield('title')</title>


    @include('admin.include.style')
</head>

<body class="skin-blue fixed-layout">

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Panel</p>
        </div>
    </div>

    <div id="main-wrapper">

        @include('admin.include.header')

        @include('admin.include.left-sidebar')

        <div class="page-wrapper">

            <div class="container-fluid">

                @yield('body')

            </div>

        </div>

        @include('admin.include.footer')

    </div>

    @include('admin.include.script')
</body>

</html>
