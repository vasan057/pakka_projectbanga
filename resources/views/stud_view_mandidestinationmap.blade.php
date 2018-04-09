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
            
        <div id="page-wrapper" style="min-height: 208px;height: 1145px;">
            <div class="row">
                <div class="col-lg-12"><br><br>
                <div class="panel panel-default">
                    <div class="panel-body" style="color:#264595"><Strong>Mandi - Delivery Mapping</Strong></div>
                </div>
                    
                    <button style="float: right;" class="btn btn-norm" data-url-mandi="{{url('getdropdownmandi')}}" data-url-destination="{{url('getdropdowndestination')}}" id='modal' data-toggle="modal" data-target="#myModal1">Add Record</button>    
               <br><br>  </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" id="events-table-wrapper">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           
                            <table style= "width:100%" class="table table-striped table-bordered table-hover" id="dataTables-examples">
                                <thead>
                                    <tr bgcolor="#264595">
                                        <th class="custom_color">Mandi Name</th>
                                        <th class="custom_color">Delivery Location</th>
                                        <th class="custom_color">Active</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count=1;?>
                                @foreach ($mandi_destinations as $mandi_destination)
                                    <tr class="odd gradeX">                                     
                                        <td>{{$mandi_destination->mandi->short_name or ''}}</td>
                                        <td>{{$mandi_destination->destination->short_name or ''}}</td>
                                        <td>{{trans('general.'.$mandi_destination->active)}}</td>
                                        
                                    </tr>
                                @endforeach 
                                </tbody>
                            </table>
                            {{$mandi_destinations->links()}}
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
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
    <script>

		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,id,userid,url) {
            var id = id;
            var column = column;
            var changed_val = editableObj.innerHTML;
            var table = "mandidestinationmapping";
            if(column=='destination_id' && changed_val=="")
            {
                alert("Please Select destination");
                return false;
            } 
            if(column=='mandi_id' && changed_val=="")
            {
                alert("Please Select Mandi ID");
                return false;
            } 
            if(column=='active' && changed_val=="")
            {
                alert("Please Select Active");
                return false;
            } 
            if(column=='destination_id')
            {
                changed_val = $("#_destination_id"+id).val();
            }  
            if(column=='mandi_id')
            {
                changed_val = $("#_mandi_id"+id).val();
            }  
            if(column=='active')
            {
                changed_val = $("#_active"+id).val();
            }  
            if(changed_val==userid)
            {
                location.reload();
            }
            else{
           // alert(changed_val);
                $.ajax({
                type:'POST', 
                url:url, 
                //data:'_token=<?php //echo csrf_token() ?>',
                data:{id:id,column:column,changed_val:changed_val,table:table,"_token": "{{ csrf_token() }}"},
                success:function(response){ 
                    if(response.error){
                        var err = '';
                        $.each(response.error,function(k,v){
                            err +=  v+"\n";
                        });
                        alert(err);
                        return false;
                    }else if(response.success){
                        location.reload();
                    }
                } 
            
            }); 
        }
		}
		</script>
    <script>
    $(document).ready(function() {

        $('#dataTables-example').DataTable({
            responsive: false
           
        });
       
    });

    function showEdit(editableObj) {
        $(editableObj).css("background","#FFF");
    } 

    function getdestination(editableObj,id,destination_id,url) {
			$(editableObj).css("background","#FFF");
			
			$("#destination_id"+id).hide();
			$("#_destination_id"+id).show();
            $.ajax({
                type:'GET', 
                url:url, 
                //data:'_token=<?php //echo csrf_token() ?>',
                //data:{mandi_name:mandi_name,agmark_market_id:agmark_market_id,location_id:location_id,short_name:short_name,address_1:address_1,address_1:address_1,address_2:address_2,pincode:pincode,city:city,district:district,state:state,user_id:user_id,"_token": "{{ csrf_token() }}"},
                dataType: "json",
                success:function(response){ 
                    $("#_destination_id"+id).empty();
                    $("#_destination_id"+id).append('<option value="">'+destination_id+'</option>');
                    $.each(response, function(key, value) {
                        //$('select[name="user_id"]').append('<option value="'+ key +'">'+ value.id +'</option>');
                        $("#_destination_id"+id).append('<option value="'+ value.id +'">'+ value.short_name +'</option>');
                    });
                } 
            
            }); 
		}

        function getmandi(editableObj,id,mandi_id,url) {
			$(editableObj).css("background","#FFF");
			
			$("#mandi_id"+id).hide();
			$("#_mandi_id"+id).show();
            $.ajax({
                type:'GET', 
                url:url, 
                //data:'_token=<?php //echo csrf_token() ?>',
                //data:{mandi_name:mandi_name,agmark_market_id:agmark_market_id,location_id:location_id,short_name:short_name,address_1:address_1,address_1:address_1,address_2:address_2,pincode:pincode,city:city,district:district,state:state,user_id:user_id,"_token": "{{ csrf_token() }}"},
                dataType: "json",
                success:function(response){ 
                    $("#_mandi_id"+id).empty();
                    $("#_mandi_id"+id).append('<option value="">'+mandi_id+'</option>');
                    $.each(response, function(key, value) {
                        //$('select[name="user_id"]').append('<option value="'+ key +'">'+ value.id +'</option>');
                        $("#_mandi_id"+id).append('<option value="'+ value.id +'">'+ value.mandi_name +'</option>');
                    });
                } 
            
            }); 
		}

    function getstatus(editableObj,id,active) {
			 $(editableObj).css("background","#FFF");
			$("#active"+id).hide();
			$("#_active"+id).show();
                $("#_active"+id).empty();
                    $("#_active"+id).append('<option value="">'+active+'</option>');    
                    $("#_active"+id).append('<option value="1">Active</option>');
                    $("#_active"+id).append('<option value="0">Inactive</option>');
		}


   
    </script>

<!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Mandi Delivery Mapping</h4>
        </div>
        <div class="modal-body">
      <form name="myform" id="myform" method="post" class="form-horizontal">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        
        <div class="form-group">           
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Mandi Name</label>
            <div class="col-sm-8">
              <!-- <input type="text" name="mandi_id" id="mandi_id" placeholder="Mandi ID" class="form-control"> -->
              <select id="mandi_id" name="mandi_id" class="form-control">
              <option value=''>--clear--</option>
              </select>
            </div></div>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Delivery Location</label>
            <div class="col-sm-8">
              <!-- <input type="text" name="location_id" id="location_id" placeholder="Location ID" class="form-control"> -->
              <select id="destination_id" name="destination_id" class="form-control">
              <option value=''>--clear--</option>
              </select>
            </div></div>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Active</label>
            <div class="col-sm-8">
              <!-- <input type="text" name="active" id="active" placeholder="Active" class="form-control"> -->
              <select id="active" name="active" class="form-control">
              <option value=''>--clear--</option>
              <option value='1'>Active</option>
              <option value='0'>Inactive</option>
              </select>
            </div>
          </div>
        </form>
        </div>
        <div class="modal-footer">
        <input type='submit' class="btn btn-success" id="updmandidestination" data-url="{{url('getinsertmandidestination')}}" value="Insert Details" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->


</body>
<script>
    $(document).ready(function() {
        $('select').hide();
        $( ".paginate_button" ).click(function(){
            $('select').hide();
        }); 
        $("#modal").click(function(){
            $('#destination_id').show();
            $('#mandi_id').show();
            $('#active').show();
            var url_mandi = $(this).attr('data-url-mandi');
            var url_destination = $(this).attr('data-url-destination');
            $.ajax({
                type:'GET', 
                url:url_destination, 
                //data:'_token=<?php //echo csrf_token() ?>',
                //data:{mandi_name:mandi_name,agmark_market_id:agmark_market_id,location_id:location_id,short_name:short_name,address_1:address_1,address_1:address_1,address_2:address_2,pincode:pincode,city:city,district:district,state:state,user_id:user_id,"_token": "{{ csrf_token() }}"},
                dataType: "json",
                success:function(response){ 
                    $('select[name="destination_id"]').empty();
                    $('select[name="destination_id"]').append('<option disabled selected value></option>');
                    $.each(response, function(key, value) {
                        //$('select[name="user_id"]').append('<option value="'+ key +'">'+ value.id +'</option>');
                        $('select[name="destination_id"]').append('<option value="'+ value.id +'">'+ value.short_name +'</option>');
                    });
                } 
            
            }); 
            $.ajax({
                type:'GET', 
                url:url_mandi, 
                //data:'_token=<?php //echo csrf_token() ?>',
                //data:{mandi_name:mandi_name,agmark_market_id:agmark_market_id,location_id:location_id,short_name:short_name,address_1:address_1,address_1:address_1,address_2:address_2,pincode:pincode,city:city,district:district,state:state,user_id:user_id,"_token": "{{ csrf_token() }}"},
                dataType: "json",
                success:function(response){ 
                    $('select[name="mandi_id"]').empty();
                    $('select[name="mandi_id"]').append('<option disabled selected value></option>');
                    $.each(response, function(key, value) {
                        //$('select[name="user_id"]').append('<option value="'+ key +'">'+ value.id +'</option>');
                        $('select[name="mandi_id"]').append('<option value="'+ value.id +'">'+ value.short_name +'</option>');
                    });
                } 
            
            }); 
        });
        $("#updmandidestination").click(function(){

            var destination_id = $("#destination_id").val();
            var mandi_id = $("#mandi_id").val();
            var active = $("#active").val();
            var url = $(this).attr('data-url');
            var mail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var name=/^[A-Za-z ]+$/;
            var phon = /^\d{10}$/; 
            var pin = /^\d{6}$/; 
            //var num=/\D/;
            var num=/^[0-9]*$/;
            var decimalno=/^-?\d*(\.\d+)?$/;
            var addrs=/^[0-9a-zA-Z\s,-]+$/;
            var usrid=/^[0-9a-zA-Z\s]+$/;
            var ifsc=/^[A-Za-z]{4}\d{7}$/;
            var grades=/[A-C][+-]?|D/;

            if(destination_id=="")
            {
                alert("Please Enter User ID");
                $("#destination_id").focus();
                return false;
            }
           else if(mandi_id=="")
            {
                alert("Please Select Mandi ID");
                return false;
            }
            else if(active=="")
            {
                alert("Please Select Active");
                return false;
            }
            else{
                $.ajax({
                type:'POST', 
                url:url, 
                //data:'_token=<?php //echo csrf_token() ?>',
                data:{destination_id:destination_id,mandi_id:mandi_id,active:active,"_token": "{{ csrf_token() }}"},
                success:function(res){ 
                    if(res.error){
                         var err = "";
                    $.each(res.error,function(k,v){
                        err += v+"\n";
                    });
                    alert(err);
                       
                        return false;
                    }else if(res.success){
                        location.reload();
                    }
                } 
            
            }); 
            }
        });
    }); 
</script>
</html>
