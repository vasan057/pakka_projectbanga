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
                    <div class="panel-body" style="color:#9A1031"><Strong>User Role Mapping Details</Strong></div>
                </div>
                    
                    <button style="float: right;" class="btn btn-danger" id='modal' data-toggle="modal" data-target="#myModal1">Add Record</button>    
               <br><br>  </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" id="events-table-wrapper">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           
                            <table style= "width:100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr bgcolor="#9A1031">
                                        <th class="custom_color">User ID</th>
                                        <th class="custom_color">Role ID</th>
                                        <th class="custom_color">Active</th>
                                       <!-- <th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count=1;?>
                                @foreach ($users as $user)
                                <?php
                                $id= $user->id ; 
                               
                               
                                ?>

                                    <tr class="odd gradeX">                                     
                                        <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'user_id','<?php echo $id; ?>','{{url('getupd')}}')">{{ $user->user_id }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'role_id','<?php echo $id; ?>','{{url('getupd')}}')">{{ $user->role_id }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'active','<?php echo $id; ?>','{{url('getupd')}}')">{{ $user->active }}</td>
                                    </tr>
                                    <?php /*if($count==1)
                                    {$count=2;}
                                    else
                                    {$count=1;}*/
                                    
                                    
                                    
                                    ?>
                                    
                                    @endforeach 
                                </tbody>
                            </table>
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
		
		function saveToDatabase(editableObj,column,id,url) {
            var id = id;
            var column = column;
            var changed_val = editableObj.innerHTML;
            var table = "userrolemapping";
           // alert(changed_val);
                $.ajax({
                type:'POST', 
                url:url, 
                //data:'_token=<?php //echo csrf_token() ?>',
                data:{id:id,column:column,changed_val:changed_val,table:table,"_token": "{{ csrf_token() }}"},
                success:function(response){ 
                //$("#ajaxResponse").html(data.msg); 
               //if(response == "success")
                    //alert(response);
                    location.reload();
                } 
            
            }); 
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
   
    </script>

<!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">User Role Mapping Details</h4>
        </div>
        <div class="modal-body">
      <!--<form name="myform" id="myform" method="post">-->
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        
        <div class="form-group">
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">User ID</label>
            <div class="col-sm-9">
              <input type="text" name="user_id" id="user_id" placeholder="User ID" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Role ID</label>
            <div class="col-sm-9">
              <input type="text" name="role_id" id="role_id" placeholder="Role ID" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Active</label>
            <div class="col-sm-9">
              <input type="text" name="active" id="active" placeholder="Active" class="form-control">
            </div>
          </div><br>
        <!--</form>-->
        </div>
        <div class="modal-footer">
        <input type='submit' class="btn btn-success" id="upduserrole" data-url="{{url('getinsertuserrole')}}" value="Insert Details" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->


</body>
<script>
    $(document).ready(function() {
        $("#upduserrole").click(function(){

            var url = $(this).attr('data-url');

            var user_id = $("#user_id").val();
            var role_id = $("#role_id").val();
            var active = $("#active").val();

           // if(user_id==""){alert("hi");return false;}
           /*  else if(password==""){alert("hi");return false;}
            else if(mobile_1==""){alert("hi");return false;}
            else if(mobile_2==""){alert("hi");return false;}
            else if(address_1==""){alert("hi");return false;}
            else if(address_2==""){alert("hi");return false;}
            else if(pincode==""){alert("hi");return false;}
            else if(gstin==""){alert("hi");return false;}
            else if(roles_id==""){alert("hi");return false;}
            else if(email_1==""){alert("hi");return false;}
            else if(email_2==""){alert("hi");return false;}
            else if(active==""){alert("hi");return false;} */
           // else{
                $.ajax({
                type:'POST', 
                url:url, 
                //data:'_token=<?php //echo csrf_token() ?>',
                data:{user_id:user_id,role_id:role_id,active:active,"_token": "{{ csrf_token() }}"},
                success:function(response){ 
                
                    //alert(response);
                    location.reload();
                } 
            
            }); 
           // }
        });
    }); 
</script>
</html>
