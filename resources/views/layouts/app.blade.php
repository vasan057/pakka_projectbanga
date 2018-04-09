<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UB Barley Procurementddd</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('theme/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('theme/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{asset('theme/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('theme/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('theme/dist/css/sb-admin-2-login.css')}}" rel="stylesheet">
    <link href="{{asset('theme/dist/css/custom.css')}}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{asset('theme/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta name="csrf-token" content="<?php echo csrf_token() ?>" />  
    @stack('style')
    </head>
    <body>
        <div id="wrapper">
            @include('layouts.nav_header')
            @yield('content')
            @stack('modal')
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('theme/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->


    <!-- DataTables JavaScript -->
    <script src="{{asset('theme/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
   
        </script>
     
        @stack('script')
    </body>