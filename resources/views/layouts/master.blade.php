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

    <!-- DataTable.net -->
    <link rel="stylesheet" href="{{ URL::to('src/css/custom-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::to('libs/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('src/dataTableFull/Buttons-1.2.2/css/buttons.dataTables.min.css') }}">



    <link rel="stylesheet" href="{{URL::to('libs/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ URL::to('libs/toastr/toastr.min.css') }}">
    <!-- malihu custom scrollbar plugin -->
    <link rel="stylesheet" href="{{ URL::to('libs/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">

    <link rel="stylesheet" href="{{ URL::to('libs/jquery-ui/themes/hot-sneaks/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('libs/jt.timepicker/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ URL::to('libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('libs/datepair.js/lib/jquery.ptTimeSelect.css') }}">
    <link rel="stylesheet" href="{{ URL::to('libs/datepair.js/lib/pikaday.css') }}">


    @yield('styles')

    <!-- jQuery 2.2 -->
    <script src=" {{ URL::to('libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src=" {{ URL::to('libs/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- jQuery 2.1 -->
    {{--<script   src="https://code.jquery.com/jquery-2.1.4.min.js"   integrity="sha256-8WqyJLuWKRBVhxXIL1jBDD7SDxU936oZkCnxQbWwJVw="   crossorigin="anonymous"></script>--}}
</head>

<body>

<div id="wrapper">
    @include('partials.Navbar')
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
<script src=" {{ URL::to('libs/moment/locale/vi.js') }} "></script>

<!-- Datatables.net -->
<script src="{{ URL::to('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::to('libs/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ URL::to('libs/datatables.net/js/dataTables.tableTools.js') }}"></script>

<script src="{{ URL::to('src/dataTableFull/Buttons-1.2.2/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::to('src/dataTableFull/pdfmake-0.1.18/build/pdfmake.min.js') }}"></script>
<script src="{{ URL::to('src/dataTableFull/pdfmake-0.1.18/build/vfs_fonts.js') }}"></script>
<script src="{{ URL::to('src/dataTableFull/Buttons-1.2.2/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::to('src/dataTableFull/Buttons-1.2.2/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::to('src/dataTableFull/JSZip-2.5.0/jszip.min.js') }}"></script>

<!-- Hightcharts -->
<script src="{{ URL::to('libs/highcharts/highcharts.js') }}"></script>

<!-- Validate -->
<script src="{{ URL::to('libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>

<!-- Toastr -->
<script src="{{ URL::to('libs/toastr/toastr.min.js') }}"></script>



<!-- Global -->
<script src=" {{ URL::to('src/js/global.js') }} "></script>

<!-- datetimepicker -->
<script src="{{ URL::to('libs/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- malihu custom scrollbar plugin -->
<script src="{{ URL::to('libs/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>

<!-- Datepair -->
<script src="{{ URL::to('libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::to('libs/jt.timepicker/jquery.timepicker.min.js') }}"></script>
<script src="{{ URL::to('libs/datepair.js/dist/datepair.min.js') }}"></script>

<script src="{{ URL::to('libs/datepair.js/lib/pikaday.js') }}"></script>
<script src="{{ URL::to('libs/datepair.js/lib/jquery.ptTimeSelect.js') }}"></script>
<script src="{{ URL::to('libs/datepair.js/lib/moment.min.js') }}"></script>

@yield('javascripts')

</body>

</html>