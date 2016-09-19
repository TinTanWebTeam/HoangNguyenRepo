<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom Bootstrap Core CSS -->
    <link href=" {{ URL::to('libs/bootstrap/dist/css/bootstrap.material.min.css') }} " rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href=" {{ URL::to('libs/metisMenu/dist/metisMenu.min.css')  }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href=" {{ URL::to('src/css/sb-admin-2.css') }} " rel="stylesheet">

    <!-- Custom Fonts -->
    <link href=" {{ URL::to('libs/font-awesome/css/font-awesome.min.css') }} " rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ URL::to('src/css/custom-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::to('libs/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    @yield('styles')

    <!-- jQuery -->
    <script src=" {{ URL::to('libs/jquery/dist/jquery.min.js') }}"></script>

</head>

<body>

<div id="wrapper">
    @include('partials.navbar')
    <div id="page-wrapper">
        @yield('content')
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Bootstrap Core JavaScript -->
<script src=" {{ URL::to('libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src=" {{ URL::to('libs/metisMenu/dist/metisMenu.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src=" {{ URL::to('src/js/sb-admin-2.js') }} "></script>

<!-- Lodash -->
<script src=" {{ URL::to('libs/lodash/dist/lodash.min.js') }} "></script>

<!-- Moment -->
<script src=" {{ URL::to('libs/moment/min/moment.min.js') }} "></script>

<!-- Datatables.net -->
<script src="{{ URL::to('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>


<script src="{{ URL::to('libs/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ URL::to('libs/datatables.net/js/dataTables.tableTools.js') }}"></script>

<!-- Hightcharts -->
<script src="{{ URL::to('libs/highcharts/highcharts.js') }}"></script>

<!-- Global -->
<script src=" {{ URL::to('src/js/global.js') }} "></script>

@yield('javascripts')

</body>

</html>