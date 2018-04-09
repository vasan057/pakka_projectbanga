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
                    <div class="panel-body" style="color:#9A1031"><Strong>FOR Line Items</Strong></div>
                    <div class="panel-body"  id="test" style="color:#9A1031"><Strong>FOR Line Items</Strong></div>
                </div>
                    
                    <button style="float: right;" class="btn btn-danger" id='modal' data-toggle="modal" data-target="#myModal1">Enter Details</button>    
               <br><br>  </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" id="events-table-wrapper">
                <div class="col-lg-12">
                   
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
        <!-- /#page-wrapper -->

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
    <script>

		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		</script>
    <script>
    $(document).ready(function() {
        $('#myModal1').on('show.bs.modal',function(e){
            var data = $(e.relatedTarget);
            console.log(data);
            var count = data.length;
           var url = $('#myModal').attr('data-url');
            if(count){
                $("#myModal1 form input[name='_method']").remove();
                $("#myModal1 form").attr('action',url);
                $("#myModal1 .modal-title").html('Enter Order Details');
                $("#myModal1 #updusermandi").val('Get Price');
            }else{
                $("#myModal1 form").append("<input type='hidden' name='_method' value='put'>");
                $("#myModal1 .modal-title").html('Freight Details');
                $("#myModal1 #updusermandi").val('Freight Details');
            }
        });
        $('#dataTables-example').DataTable({
            responsive: false
           
        });
        $('.edit-modal').click(function(e){
            var id = $(this).attr('data-id');
            var url = $(this).attr('data-url');
            $('#myModal1').modal('show');
            $('#myModal1 form').attr('action',$(this).attr('data-update'));
            $.ajax({
                type:'get',
                url : url,
                success :function(res){
                    if(res.data){
                        var data = res.data;
                                               
                        $('#parameter').val(data.parameter);
                        $('#group').val(data.group);
                        $('#data_type').val(data.data_type);
                        $('#sequence').val(data.sequence);
                        $('#base').val(data.base);
                        $('#value').val(data.value);
                        $('#valid_from').val(data.valid_from);
                        $('#valid_to').val(data.valid_to);
                       
                       /*  if(data.user){
                            $('#user_id').val(data.user.id);
                        }
                        if(data.mandi){
                            $('#mandi_id').val(data.mandi.id);
                        }
                        $('#active').val(data.active); */
                        
                    }
                }
            })
        });
       
    });

    function showEdit(editableObj) {
        $(editableObj).css("background","#FFF");
    } 
   
    </script>

<!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Enter Order Details</h4>
        </div>
        <div class="modal-body">
      <form name="myform" id="myform" method="post" action="{{url('for-details-getMandi')}}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        <div class="form-group">
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Order ID</label>
            <div class="col-sm-9">
            <input type="text" id="order_id" name="order_id" class="form-control"/>
            </div><br><br>            
        </form>
        </div>
        <div class="modal-footer">
        <input type='button' class="btn btn-success" id="getPrice" data-url1="{{url('for-details-getGID')}}" data-url2="{{url('for-details-getParameter')}}" value="Get For Price" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->


</body>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

    $(document).ready(function() {
       
        $("#getPrice").click(function(){

           var data = $("#myModal1 form").serializeArray();
           var url = $("#myModal1 form").attr('action');
           var url1 = $(this).attr('data-url1');
           var url2 = $(this).attr('data-url2');
           $.ajax({
            type:'POST', 
            url: url, 
            data: data,
                success:function(response){
                    var a = response.data;
                        var mandi_id = a.mandi_id;
                        var destination_id = a.destination_id;
                        var order_quantity = a.order_quantity;
                        var order_price = a.order_price;
                        var base_price = order_quantity * order_price;
                    //alert(mandi_id+"##"+destination_id+"##"+order_quantity+"##"+order_price);
                    if(response.error){
                        var err = '';
                        $.each(response.error,function(k,v){
                            err +=  v+"\n";
                        });
                        alert(err);
                        return false;
                    }
                    else {
                        $.ajax({
                            type:'POST', 
                            url: url1, 
                            data:{mandi_id:mandi_id,destination_id:destination_id,"_token": "{{ csrf_token() }}"},
                            success:function(response){
                                    var an = response.data;
                                    var gid = an.gid;
                                    var valid_from = an.valid_from;
                                    //valid_from = valid_from.substring(0,10);
                                 //  alert(mandi_id+"##"+destination_id+"##"+order_quantity+"##"+order_price+"##"+gid+"##"+valid_from);
                                 if(response.error){
                                    var err = '';
                                    $.each(response.error,function(k,v){
                                        err +=  v+"\n";
                                    });
                                    alert(err);
                                    return false;
                                }
                                else{
                                    $.ajax({
                                        type:'POST', 
                                            url: url2, 
                                            data:{gid:gid,quantity:order_quantity,base_rate:order_price,base_price:base_price,valid_from:valid_from,"_token": "{{ csrf_token() }}"},
                                            success:function(response){
                                                $('#test').html(response);
                                                $('#myModal1').modal('hide');
                                                //alert(response);
                                                //console.log(response);
                                                //var para = response.data;
                                                //alert(para.parameter);
                                            }
                                    });
                                }
                           
                            }
                        });
                    }
                }
        }); 
    }); 

});
</script>
</html>
