<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ URL::to('libs/bootstrap/dist/css/bootstrap.material.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::to('src/css/sb-admin-2.css') }}">
    <link rel="stylesheet" href="{{ URL::to('src/css/custom-bootstrap.css') }}">

    <!-- MetisMenu CSS -->
    <link rel="stylesheet" href="{{ URL::to('libs/metisMenu/dist/metisMenu.min.css') }}">

    <!-- Font Awesome -->
    <link href=" {{ URL::to('libs/font-awesome/css/font-awesome.min.css') }} " rel="stylesheet" type="text/css">

    <!-- DataTable.net -->
    <link rel="stylesheet" href="{{ URL::to('src/dataTableFull/DataTables-1.10.12/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('src/dataTableFull/DataTables-1.10.12/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('src/dataTableFull/Buttons-1.2.2/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('src/dataTableFull/TableTools/css/dataTables.tableTools.css') }}">
    <link rel="stylesheet" href="{{ URL::to('src/dataTableFull/FixedHeader-3.1.2/css/fixedHeader.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('src/dataTableFull/Responsive-2.1.0/css/responsive.bootstrap.min.css') }}">


    <!-- Toastr -->
    <link rel="stylesheet" href="{{ URL::to('libs/toastr/toastr.min.css') }}">

    <!-- Scrollbar -->
    <link rel="stylesheet" href="{{ URL::to('libs/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">

    <!-- Datepair.js -->
    <link rel="stylesheet" href="{{ URL::to('libs/jquery-ui/themes/ui-lightness/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('libs/jt.timepicker/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ URL::to('libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('libs/datepair.js/lib/jquery.ptTimeSelect.css') }}">
    <link rel="stylesheet" href="{{ URL::to('libs/datepair.js/lib/pikaday.css') }}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('src/tableAutocomplete/tautocomplete.css')}}"/>

    @yield('styles')

    <!-- jQuery 2.2 -->
    <script src=" {{ URL::to('libs/jquery/dist/jquery.min.js') }}"></script>
</head>

<body>

<div id="wrapper" style="background-color: #F5F5F5">
    @include('partials.Navbar')
    <div id="page-wrapper">
        @yield('content')
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- JAVASCRIPT -->

<!-- jQuery UI -->
<script src="{{ URL::to('libs/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::to('libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu -->
<script src="{{ URL::to('libs/metisMenu/dist/metisMenu.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ URL::to('src/js/sb-admin-2.js') }}"></script>

<!-- Moment -->
<script src="{{ URL::to('libs/moment/min/moment.min.js') }}"></script>
<script src="{{ URL::to('libs/moment/locale/vi.js') }}"></script>
<script src="{{ URL::to('src/tableAutocomplete/tautocomplete.js') }}"></script>

<!-- Datatables.net -->
<script src="{{ URL::to('src/dataTableFull/DataTables-1.10.12/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::to('src/dataTableFull/DataTables-1.10.12/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ URL::to('src/dataTableFull/TableTools/js/dataTables.tableTools.js') }}"></script>
<script src="{{ URL::to('src/dataTableFull/Buttons-1.2.2/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::to('src/dataTableFull/pdfmake-0.1.18/build/pdfmake.min.js') }}"></script>
<script src="{{ URL::to('src/dataTableFull/pdfmake-0.1.18/build/vfs_fonts.js') }}"></script>
<script src="{{ URL::to('src/dataTableFull/Buttons-1.2.2/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::to('src/dataTableFull/Buttons-1.2.2/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::to('src/dataTableFull/JSZip-2.5.0/jszip.min.js') }}"></script>
<script src="{{ URL::to('src/dataTableFull/FixedHeader-3.1.2/js/dataTables.fixedHeader.js') }}"></script>
<script src="{{ URL::to('src/dataTableFull/Responsive-2.1.0/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::to('src/dataTableFull/Responsive-2.1.0/js/responsive.bootstrap.min.js') }}"></script>

<!-- Hightcharts -->
<script src="{{ URL::to('libs/highcharts/highcharts.js') }}"></script>

<!-- Validate -->
<script src="{{ URL::to('libs/jquery-validation/dist/jquery.validate.js') }}"></script>
<script src="{{ URL::to('libs/jquery-validation/dist/additional-methods.min.js') }}"></script>

<!-- Toastr -->
<script src="{{ URL::to('libs/toastr/toastr.min.js') }}"></script>

<!-- Scrollbar -->
<script src="{{ URL::to('libs/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>

<!-- Datepair.js -->
<script src="{{ URL::to('libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::to('libs/jt.timepicker/jquery.timepicker.min.js') }}"></script>
<script src="{{ URL::to('libs/datepair.js/dist/datepair.min.js') }}"></script>

<script src="{{ URL::to('libs/datepair.js/lib/pikaday.js') }}"></script>
<script src="{{ URL::to('libs/datepair.js/lib/jquery.ptTimeSelect.js') }}"></script>
<script src="{{ URL::to('libs/bootstrap-datepicker/dist/locales/bootstrap-datepicker.vi.min.js') }}"></script>

<!-- JQuery Format Currency -->
<script src="{{ URL::to('src/jquery.formatCurrency/jquery.formatCurrency-1.4.0.min.js') }}"></script>
<script src="{{ URL::to('src/jquery.formatCurrency/i18n/jquery.formatCurrency.all.js') }}"></script>

<!-- Lodash -->
<script src="{{ URL::to('libs/lodash/dist/lodash.min.js') }}"></script>

<!-- Global -->
<script src="{{ URL::to('src/js/global.js') }}"></script>

@yield('javascripts')

</body>

</html>
