<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../build/images/favicon.ico" type="image/ico"/>
    <title>Gentelella Alela! | قالب مدیریت رایگان </title>

    <!-- Bootstrap -->
    <link href="{{ asset('panel/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('panel/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('panel/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('panel/css/custom.min.css') }}" rel="stylesheet">
    @yield('css')
</head>
<!-- /header content -->
<body class="nav-md">
<div class="container body">
    <div class="main_container">

    @include('panel.layouts.sidebar')

        <!-- top navigation -->
    @include('panel.layouts.header')

        <!-- /top navigation -->
        <!-- /header content -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="clearfix"></div>

                <div class="row">
                    @yield('content')

                </div>
            </div>
        </div>
        <!-- /page content -->


    </div>
</div>
<div id="lock_screen">
    <table>
        <tr>
            <td>
                <div class="clock"></div>
                <span class="unlock">
                    <span class="fa-stack fa-5x">
                      <i class="fa fa-square-o fa-stack-2x fa-inverse"></i>
                      <i id="icon_lock" class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                </span>
            </td>
        </tr>
    </table>
</div>


<script src="{{ asset('panel/js/jquery.min.js') }}"></script>
<script src="{{ asset('panel/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('panel/js/custom.js') }}"></script>
<script src="{{ asset('panel/js/laravel.js') }}"></script>
@yield('js')
</body>
</html>
