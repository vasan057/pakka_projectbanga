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
                    <div class="panel-body" style="color:#9A1031"><Strong>States Details</Strong></div>
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
                                        <th class="custom_color">State Name</th>
                                        <th class="custom_color">Sort Order</th>
                                        <th class="custom_color">Short Name</th>
                                        <th class="custom_color">Status</th>
                                        
                                       <!-- <th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count=1;?>
                                @foreach ($users as $user)
                                <?php
                                $id= $user->id ; 
                                $state_name= $user->state_name ; 
                                $sort_order= $user->sort_order ; 
                                $short_name= $user->short_name; 
                                $status= $user->status ; 
                               
                                ?>

                                    <tr class="odd gradeX">                                     
                                        <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'state_name','<?php echo $id; ?>','<?php echo $state_name;?>','{{url('getupdall')}}')">{{ $user->state_name }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'sort_order','<?php echo $id; ?>','<?php echo $sort_order;?>','{{url('getupdall')}}')">{{ $user->sort_order }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'short_name','<?php echo $id; ?>','<?php echo $short_name;?>','{{url('getupdall')}}')">{{ $user->short_name }}</td>
                                        
                                        <td onClick="getstatus(this,'<?php echo $id; ?>','<?php echo $status; ?>');" >
                                        <span id='<?php echo "status".$id; ?>' >{{ $user->status }}</span>
                                        <select id='<?php echo "_status".$id; ?>' onchange="saveToDatabase(this,'status','<?php echo $id; ?>','<?php echo $id;?>','{{url('getupdall')}}')"> 
					                    </select>
                                        </td>
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
         $('select').hide();
        $( ".paginate_button" ).click(function(){
            $('select').hide();
        });
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
        function getstatus(editableObj,id,status) {
			 $(editableObj).css("background","#FFF");
			$("#status"+id).hide();
			$("#_status"+id).show();
                $("#_status"+id).empty();
                    $("#_status"+id).append('<option value="">'+status+'</option>');    
                    $("#_status"+id).append('<option value="Active">Active</option>');
                    $("#_status"+id).append('<option value="Inactive">Inactive</option>');
		}

		function saveToDatabase(editableObj,column,id,userid,url) {

            
            
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
            
            var id = id;
            var column = column;
            var changed_val = editableObj.innerHTML;
            var table = "states";
           // alert(changed_val);

           if(column=='state_name' && changed_val=="")
            {
                alert("Please Enter State");
                return false;
            } 
            if(column=='state_name' && usrid.test(changed_val) == false)
            {
                alert("Please enter valid State");
                return false;
            }
            if(column=='sort_order' && changed_val=="")
            {
                alert("Please Enter Sort Order");
                return false;
            } 
            if(column=='sort_order' && num.test(changed_val) == false)
            {
                alert("Please enter valid Sort Order");
                return false;
            }
            if(column=='short_name' && changed_val=="")
            {
                alert("Please Enter Short Name");
                return false;
            } 
            if(column=='short_name' && usrid.test(changed_val) == false)
            {
                alert("Please enter valid Short Name");
                return false;
            }
            if(column=='status')
            {
                changed_val = $("#_status"+id).val();
            } 
            if(changed_val==userid)
            {
                location.reload();
            }
            else
            {
                $.ajax({
                type:'POST', 
                url:url, 
                //data:'_token=<?php //echo csrf_token() ?>',
                data:{id:id,column:column,changed_val:changed_val,table:table,"_token": "{{ csrf_token() }}"},
                success:function(response){ 
                    if(response=="true"){
                        alert("Record Updated Sucessfully");
                        location.reload();
                    }else{
                        alert("Duplicate Record Found");
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
   
    </script>

<!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">State Details</h4>
        </div>
        <div class="modal-body">
      <!--<form name="myform" id="myform" method="post">-->
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        
        <div class="form-group">
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">State Name</label>
            <div class="col-sm-9">
              <input type="text" name="state_name" id="state_name" placeholder="State Name" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Sort Order</label>
            <div class="col-sm-9">
              <input type="text" name="sort_order" id="sort_order" placeholder="Sort Order" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Short Name</label>
            <div class="col-sm-9">
              <input type="text" name="short_name" id="short_name" placeholder="Short Name" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Status</label>
            <div class="col-sm-9">
              <!-- <input type="text" name="status" id="status" placeholder="Status" class="form-control"> -->
              <select id="status" name="status" class="form-control">
              <option value=''>--clear--</option>
              <option value='Active'>Active</option>
              <option value='Inactive'>Inactive</option>
              </select>
            </div><br><br>
            
          </div><br>
        <!--</form>-->
        </div>
        <div class="modal-footer">
        <input type='submit' class="btn btn-success" id="updstates" data-url="{{url('getinsertstate')}}" value="Insert Details" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->


</body>
<script>
    $(document).ready(function() {
        $("#updstates").click(function(){

            var url = $(this).attr('data-url');

            var state_name = $("#state_name").val();
            var sort_order = $("#sort_order").val();
            var short_name = $("#short_name").val();
            var status = $("#status").val();
            
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
          //  if(state_name==""){alert("hi");return false;}
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
          //  else{
            if(state_name=="")
            {
                alert("Please Enter State Name");
                $("#state_name").focus();
                return false;
            }
            else{
                $.ajax({
                type:'POST', 
                url:url, 
                //data:'_token=<?php //echo csrf_token() ?>',
                data:{state_name:state_name,sort_order:sort_order,short_name:short_name,status:status,"_token": "{{ csrf_token() }}"},
                success:function(response){ 
                    if(response.error){
                    var err = "";
                    $.each(response.error,function(k,v){
                        err += v+"\n";
                    });
                    alert(err);
                    return false;
                    }
                    if(response=="true"){
                        alert("Record Created Sucessfully");
                        location.reload();
                    }else{
                        alert("Duplicate Record Found");
                    }
                } 
            
            }); 
       }
        });
    }); 
</script>
</html>
