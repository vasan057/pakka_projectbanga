<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UB Barley Procurement</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('theme/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('theme/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{asset('theme/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('theme/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('theme/dist/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('theme/dist/css/custom.css')}}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{asset('theme/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta name="csrf-token" content="<?php echo csrf_token() ?>" />    
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
  </script>

  <script type="text/javascript">
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
  </script>
<style>

</style>
</head>

<body>

<div id="wrapper">

<!-- Navigation -->
@include('layouts.nav-bar')
<!-- endnav -->
            
        <div id="page-wrapper" style="min-height: 208px;height: 865px;">
            <div class="row">
                <div class="col-lg-12"><br><br>
                <div class="panel panel-default">
                    <div class="panel-body" style="color:#9A1031"><Strong>Upload Agmarknet</Strong></div>
                </div>
                    
                    
               <br><br>  </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" id="events-table-wrapper">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <!--<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
                        <a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
                        <a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>-->
                        <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('import_agmarkmaster') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <input type="file" name="import_file" id="import_file" />
                            <!--    Additional other than webside    -->
                            <br><input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-primary" id="upload_agmark">Import File</button>
                        </form>
                        @if(Session::has('message'))
                        <div class="alert">
                            {{ Session::get('message') }}
                        <div>
                        @endif
                        </div>
                        <!-- /.panel-body -->
                        
                    </div>
                    <!-- /.panel -->
                </div>
                
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
        <!-- /#page-wrapper -->
        <br><br>
        <div class="panel panel-default">
            <div class="panel-body" style="color:#9A1031"><Strong>Please upload the file in the following format below</Strong></div>
            <table style= "width:100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr >
                                        <th>mandi_id</th>
                                        <th>state_name</th>
                                        <th>district_name</th>
                                        <th>market_center_name</th>
                                        <th>variety</th>
                                        <th>group_name</th>
                                        <th>arrival</th>
                                        <th>ag_min</th>
                                        <th>ag_max</th>
                                        <th >modal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <td>int</td>
                                <td>varchar</td>
                                <td>varchar</td>
                                <td>varchar</td>
                                <td>varchar</td>
                                <td>varchar</td>
                                <td>varchar</td>
                                <td>float</td>
                                <td>float</td>
                                <td>varchar</td>
                                </tbody>
                                </table>
        </div>
    </div>
    <!-- /#wrapper -->
    
    <script src="{{ asset('theme/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
   
    <script src="{{ asset('theme/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Metis Menu Plugin JavaScript -->
    
    <script src="{{ asset('theme/vendor/metisMenu/metisMenu.min.js') }}"></script>
    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('theme/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('theme/data/morris-data.js') }}"></script>
    

    <!-- Custom Theme JavaScript -->

    <script src="{{ asset('theme/dist/js/sb-admin-2.js') }}"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
</body>
<script>
    $(document).ready(function() {
        $("#upload_agmark").click(function(){

            var import_file = $("#import_file").val();
                 

           if(import_file==""){alert("Please Upload the file");return false;}
           
        });
    }); 
</script>
</html>
