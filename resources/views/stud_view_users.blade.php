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
    
        <div id="page-wrapper" style="min-height: 208px;height: 1145px;width: 1540px;">
            <div class="row">
                <div class="col-lg-12"><br><br>
                <div class="panel panel-default" >
                    <div class="panel-body" style="color:#9A1031"><Strong>User Details</Strong></div>
                </div>
                    
                    <button style="float: right;" class="btn btn-danger" id='modal' data-url="{{url('getdropdownrole')}}" data-toggle="modal" data-target="#myModal1">Add Record</button>    
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
                                        <th class="custom_color">Password</th>
                                        <th class="custom_color">Mobile 1</th>
                                        <th class="custom_color">Mobile 2</th>
                                        <th class="custom_color">Address 1</th>
                                        <th class="custom_color">Address 2</th>
                                        <th class="custom_color">Pincode</th>
                                        <th class="custom_color">Gstin</th>
                                        <th class="custom_color">Roles ID</th>
                                        <th class="custom_color">Email 1</th>
                                        <th class="custom_color">Email 2</th>
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
                                $user_id=$user->user_id;
                                $active=$user->active;
                                $mobile_1=$user->mobile_1;
                                $mobile_2=$user->mobile_2;
                                $address_1=$user->address_1;
                                $pincode=$user->pincode;
                                $gstin=$user->gstin;
                                $address_1=$user->address_1;
                                $address_2=$user->address_2;
                                $email_1=$user->email_1;
                                $email_2=$user->email_2;
                                ?>
                                <!--<input type="hidden" id="<?php //echo "user_id_".$id; ?>" name="<?php //echo "user_id_".$id; ?>" value="<?//echo $user_id; ?>" />-->

                                    <tr class="odd gradeX">                                     
                                        <td contentEditable='true' onClick="showEdit(this,'<?php echo $user_id;?>');" onBlur="saveToDatabase(this,'user_id','<?php echo $id; ?>','<?php echo $user_id;?>','{{url('getupdall')}}')">{{ $user->user_id }}</td>
                                        <td contentEditable='true' onClick="showEdit(this,'<?php echo $user_id;?>');" onBlur="saveToDatabase(this,'password','<?php echo $id; ?>','<?php echo "****";?>','{{url('getupdall')}}')">****</td>
                                        <td contentEditable='true' onClick="showEdit(this,'<?php echo $mobile_1;?>');" onBlur="saveToDatabase(this,'mobile_1','<?php echo $id; ?>','<?php echo $mobile_1;?>','{{url('getupdall')}}')">{{ $user->mobile_1 }}</td>
                                        <td contentEditable='true' onClick="showEdit(this,'<?php echo $mobile_2;?>');" onBlur="saveToDatabase(this,'mobile_2','<?php echo $id; ?>','<?php echo $mobile_2;?>','{{url('getupdall')}}')">{{ $user->mobile_2 }}</td>
                                        <td contentEditable='true' onClick="showEdit(this,'<?php echo $address_1;?>');" onBlur="saveToDatabase(this,'address_1','<?php echo $id; ?>','<?php echo $address_1;?>','{{url('getupdall')}}')">{{ $user->address_1 }}</td>
                                        <td contentEditable='true' onClick="showEdit(this,'<?php echo $address_2;?>');" onBlur="saveToDatabase(this,'address_2','<?php echo $id; ?>','<?php echo $address_2;?>','{{url('getupdall')}}')">{{ $user->address_2 }}</td>
                                        <td contentEditable='true' onClick="showEdit(this,'<?php echo $pincode;?>');" onBlur="saveToDatabase(this,'pincode','<?php echo $id; ?>','<?php echo $pincode;?>','{{url('getupdall')}}')">{{ $user->pincode }}</td>
                                        <td contentEditable='true' onClick="showEdit(this,'<?php echo $gstin;?>');" onBlur="saveToDatabase(this,'gstin','<?php echo $id; ?>','<?php echo $gstin;?>','{{url('getupdall')}}')">{{ $user->gstin }}</td>
                                        
                                        <td onClick="getrole(this,'<?php echo $id; ?>','<?php echo $user_id; ?>','{{url('getdropdownrole')}}');" >
                                        <span id='<?php echo "roles_id".$id; ?>' >{{ $user->roles_id }}</span>
                                        <select id='<?php echo "_roles_id".$id; ?>' onchange="saveToDatabase(this,'roles_id','<?php echo $id; ?>','<?php echo $user_id;?>','{{url('getupdall')}}')"> 
					                    </select>
                                        </td>
                                        <td contentEditable='true' onClick="showEdit(this,'<?php echo $email_1;?>');" onBlur="saveToDatabase(this,'email_1','<?php echo $id; ?>','<?php echo $email_1;?>','{{url('getupdall')}}')">{{ $user->email_1 }}</td>
                                        <td contentEditable='true' onClick="showEdit(this,'<?php echo $email_2;?>');" onBlur="saveToDatabase(this,'email_2','<?php echo $id; ?>','<?php echo $email_2;?>','{{url('getupdall')}}')">{{ $user->email_2 }}</td>
                                       
                                        <td onClick="getstatus(this,'<?php echo $id; ?>','<?php echo $active; ?>');" >
                                        <span id='<?php echo "active".$id; ?>' >{{ $user->active }}</span>
                                        <select id='<?php echo "_active".$id; ?>' onchange="saveToDatabase(this,'active','<?php echo $id; ?>','<?php echo $user_id;?>','{{url('getupdall')}}')"> 
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

		function showEdit(editableObj,user_id) {
            console.log(user_id);
			$(editableObj).css("background","#FFF");
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
            
           // var userid= $("#user_id_"+id).val();
            //console.log("beofre submit user id is ="+userid);
            var id = id;
            var column = column;
            var changed_val = editableObj.innerHTML;
            
            if(column=='user_id' && changed_val=="")
            {
                alert("Please Enter User ID");
                return false;
            } 
            if(column=='user_id' && usrid.test(changed_val) == false)
            {
                alert("Please enter valid User ID");
                return false;
            }
            if(column=='password' && changed_val=="")
            {
                alert("Please Enter Password");
                return false;
            } 
            if(column=='mobile_1' && changed_val=="")
            {
                alert("Please Enter Mobile 1");
                return false;
            } 
            if(column=='mobile_1' && phon.test(changed_val) == false)
            {
                alert("Please enter valid Mobile 1");
                return false;
            } 
            /* if(column=='mobile_2' && changed_val=="")
            {
                alert("Please Enter Mobile 2");
                return false;
            }  */
            if(column=='mobile_2' && phon.test(changed_val) == false)
            {
                alert("Please enter valid Mobile 2");
                return false;
            } 
            if(column=='address_1' && changed_val=="")
            {
                alert("Please Enter the Address 1");
                return false;
            } 
            if(column=='address_1' && addrs.test(changed_val) == false)
            {
                alert("Please enter valid Address 1");
                return false;
            } 
            if(column=='address_2' && changed_val=="")
            {
                alert("Please Enter the Address 2");
                return false;
            } 
            if(column=='address_2' && addrs.test(changed_val) == false)
            {
                alert("Please enter valid Address 2");
                return false;
            } 
            if(column=='pincode' && changed_val=="")
            {
                alert("Please Enter the Pincode");
                return false;
            } 
            if(column=='pincode' && pin.test(changed_val) == false)
            {
                alert("Please enter valid Pincode");
                return false;
            } 
            if(column=='gstin' && changed_val=="")
            {
                alert("Please Enter the GSTIN");
                return false;
            } 
            if(column=='gstin' && usrid.test(changed_val) == false)
            {
                alert("Please enter valid GSTIN");
                return false;
            } 
           /*  if(column=='email_1' && changed_val=="")
            {
                alert("Please Enter the Email 1");
                return false;
            } 
            if(column=='email_1' && mail.test(changed_val) == false)
            {
                alert("Please enter valid Email 1");
                return false;
            }  */
            if(column=='email_2' && changed_val=="")
            {
                alert("Please Enter the Email 2");
                return false;
            } 
            if(column=='email_2' && mail.test(changed_val) == false)
            {
                alert("Please enter valid Email 2");
                return false;
            } 
            if(column=='active')
            {
                changed_val = $("#_active"+id).val();
            }  
            if(column=='roles_id')
            {
                changed_val = $("#_roles_id"+id).val();
            }  
            var table = "users_basic";
            
            //alert("<?php //echo $user_id; ?>");
           // if(column=='user_id' && changed_val==userid)
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
   
    function getstatus(editableObj,id,active) {
			 $(editableObj).css("background","#FFF");
			$("#active"+id).hide();
			$("#_active"+id).show();
                $("#_active"+id).empty();
                    $("#_active"+id).append('<option value="">'+active+'</option>');    
                    $("#_active"+id).append('<option value="active">Active</option>');
                    $("#_active"+id).append('<option value="inactive">Inactive</option>');
		}

        function getrole(editableObj,id,roles_id,url) {
			$(editableObj).css("background","#FFF");
			
			$("#roles_id"+id).hide();
			$("#_roles_id"+id).show();
            $.ajax({
                type:'GET', 
                url:url, 
                //data:'_token=<?php //echo csrf_token() ?>',
                //data:{mandi_name:mandi_name,agmark_market_id:agmark_market_id,location_id:location_id,short_name:short_name,address_1:address_1,address_1:address_1,address_2:address_2,pincode:pincode,city:city,district:district,state:state,user_id:user_id,"_token": "{{ csrf_token() }}"},
                dataType: "json",
                success:function(response){ 
                    $("#_roles_id"+id).empty();
                    $("#_roles_id"+id).append('<option value="">'+roles_id+'</option>');
                    $.each(response, function(key, value) {
                        //$('select[name="user_id"]').append('<option value="'+ key +'">'+ value.id +'</option>');
                        $("#_roles_id"+id).append('<option value="'+ value.id +'">'+ value.role +'</option>');
                    });
                } 
            
            }); 
		}
    </script>

<!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">User Details</h4>
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
            <label class="col-sm-3 control-label" for="textinput">Password</label>
            <div class="col-sm-9">
              <input type="text" name="password" id="password" placeholder="Password" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Mobile 1</label>
            <div class="col-sm-9">
              <input type="text" name="mobile_1" id="mobile_1" placeholder="Mobile 1" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Mobile 2</label>
            <div class="col-sm-9">
              <input type="text" name="mobile_2" id="mobile_2" placeholder="Mobile 2" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Address 1</label>
            <div class="col-sm-9">
              <input type="text" name="address_1" id="address_1" placeholder="Address 1" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Address 2</label>
            <div class="col-sm-9">
              <input type="text" name="address_2" id="address_2" placeholder="Address 2" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Pincode</label>
            <div class="col-sm-9">
              <input type="text" name="pincode" id="pincode" placeholder="Pincode" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">GSTIN</label>
            <div class="col-sm-9">
              <input type="text" name="gstin" id="gstin" placeholder="GSTIN" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Role ID</label>
            <div class="col-sm-9">
              <!--<input type="text" name="roles_id" id="roles_id" placeholder="Role ID" class="form-control">-->
              <select id="roles_id" name="roles_id" class="form-control">
              <option value=''>--clear--</option>
              </select>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Email 1</label>
            <div class="col-sm-9">
              <input type="text" name="email_1" id="email_1" placeholder="Email 1" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Email 2</label>
            <div class="col-sm-9">
              <input type="text" name="email_2" id="email_2" placeholder="Email 2" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Active</label>
            <div class="col-sm-9">
              <!--<input type="text" name="active" id="active" placeholder="Active" class="form-control">-->
              <select id="active" name="active" class="form-control">
              <option value=''>--clear--</option>
              <option value='active'>Active</option>
              <option value='inactive'>Inactive</option>
              </select>
            </div>
          </div><br>
        <!--</form>-->
        </div>
        <div class="modal-footer">
        <input type='submit' class="btn btn-success" id="updusers" data-url="{{url('getinsertuser')}}" value="Insert Details" />
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

            var url = $(this).attr('data-url');
            $('#roles_id').show();
            $('#active').show();
            $.ajax({
                type:'GET', 
                url:url,
                //data:'_token=<?php //echo csrf_token() ?>',
                //data:{mandi_name:mandi_name,agmark_market_id:agmark_market_id,location_id:location_id,short_name:short_name,address_1:address_1,address_1:address_1,address_2:address_2,pincode:pincode,city:city,district:district,state:state,user_id:user_id,"_token": "{{ csrf_token() }}"},
                dataType: "json",
                success:function(response){ 
                    $('select[name="roles_id"]').empty();
                    $.each(response, function(key, value) {
                        //$('select[name="user_id"]').append('<option value="'+ key +'">'+ value.id +'</option>');
                        $('select[name="roles_id"]').append('<option value="'+ value.id +'">'+ value.role +'</option>');
                    });
                } 
            
            }); 
        });
        $("#updusers").click(function(){

            var url = $(this).attr('data-url');

            var user_id = $("#user_id").val();
            var password = $("#password").val();
            var mobile_1 = $("#mobile_1").val();
            var mobile_2 = $("#mobile_2").val();
            var address_1 = $("#address_1").val();
            var address_2 = $("#address_2").val();
            var pincode = $("#pincode").val();
            var gstin = $("#gstin").val();
            var roles_id = $("#roles_id").val();
            var email_1 = $("#email_1").val();
            var email_2 = $("#email_2").val();
            var active = $("#active").val();


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


            if(user_id=="")
            {
                alert("Please Enter User ID");
                return false;
            }
            else if(usrid.test(user_id) == false  && user_id !='')
            {
                alert("Please enter valid User ID");
                return false;
            }
            else if(password=="")
            {
                alert("Please Enter Password");
                return false;
            }
            else if(mobile_1=="")
            {
                alert("Please Enter Mobile 1");
                return false;
            }
            else if(phon.test(mobile_1) == false  && mobile_1 !='')
            {
                alert("Please enter valid Mobile 1");
                return false;
            }
           /*  else if(mobile_2=="")
            {
                alert("Please Enter Mobile 2");
                return false;
            } */
            else if(phon.test(mobile_2) == false  && mobile_2 !='')
            {
                alert("Please enter valid Mobile 2");
                return false;
            }
            else if(address_1=="")
            {
                alert("Please Enter the Address 1");
                return false;
            }
            else if(addrs.test(address_1) == false  && address_1 !='')
            {
                alert("Please enter valid Address 1");
                return false;
            }
            else if(address_2=="")
            {
                alert("Please Enter the Address 2");
                return false;
            }
            else if(addrs.test(address_2) == false  && address_2 !='')
            {
                alert("Please enter valid Address 2");
                return false;
            }
            else if(pincode=="")
            {
                alert("Please Enter the Pincode");
                return false;
            }
            else if(pin.test(pincode) == false  && pincode !='')
            {
                alert("Please enter valid Pincode");
                return false;
            }
            else if(roles_id=="2" && gstin=="")
            {
                alert("Please Enter the GSTIN");
                return false;
            }
            else if(roles_id=="3" && gstin=="")
            {
                alert("Please Enter the GSTIN");
                return false;
            }
            else if(usrid.test(gstin) == false  && gstin !='')
            {
                alert("Please enter valid GSTIN");
                return false;
            }
           /*  else if(email_1=="")
            {
                alert("Please Enter the Email 1");
                return false;
            } */
            else if(mail.test(email_1) == false  && email_1 !='')
            {
                alert("Please enter valid Email 1");
                return false;
            }
            /* else if(email_2=="")
            {
                alert("Please Enter the Email 2");
                return false;
            } */
            else if(mail.test(email_2) == false  && email_2 !='')
            {
                alert("Please enter valid Email 2");
                return false;
            }
            else if(active=="")
            {
                alert("Please Select Active/Inactive");
                return false;
            }
            else{
                $.ajax({
                type:'POST', 
                url:url,
                //data:'_token=<?php //echo csrf_token() ?>',
                data:{user_id:user_id,password:password,mobile_1:mobile_1,mobile_2:mobile_2,address_1:address_1,address_2:address_2,pincode:pincode,gstin:gstin,roles_id:roles_id,email_1:email_1,email_2:email_2,active:active,"_token": "{{ csrf_token() }}"},
                success:function(response){ 
                    //console.log(response);  
                    //alert(response);
                    if(response=="true"){
                        alert("Record Created Sucessfully");
                        location.reload();
                    }else{
                        alert("Duplicate Record Found");
                    }
                   // location.reload();
                } 
            
            }); 
            }
        });
    }); 
</script>
</html>
