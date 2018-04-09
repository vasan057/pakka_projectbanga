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
            <!-- style for extra width -->
        <div id="page-wrapper" style="width: 1242px;min-height: 208px;height: 1145px;">
        @php $state = App\Model\State::where('status',1)->pluck('state_name') @endphp
            <div class="row">
                <div class="col-lg-12"><br><br>
                <div class="panel panel-default">
                    <div class="panel-body" style="color:#264595"><Strong>Delivery Locations Details</Strong></div>
                </div>
                    
                    <button style="float: right;" class="btn btn-norm" id='modal' data-toggle="modal" data-target="#myModal1">Add Record</button>    
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
                                    <tr bgcolor="#264595">
                                        <th class="custom_color">Delivery Type</th>
                                        <th class="custom_color">Delivery Name</th>
                                        <th style="width:50px" class="custom_color">Short Name</th>
                                        <th class="custom_color">Address 1</th>
                                        <th class="custom_color">Address 2</th>
                                        <th class="custom_color">Pincode</th>
                                        <th class="custom_color">City</th>
                                        <th class="custom_color">District</th>
                                        <th class="custom_color">State</th>
                                        <th class="custom_color">Mobile 1</th>
                                        <th class="custom_color">Mobile 2</th>
                                        <th class="custom_color">Email 1</th>
                                        <th class="custom_color">Email 2</th>
                                        <th class="custom_color">Gstin</th>
                                        
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
                                        <td contentEditable='true' onClick="showEdit(this);" data-url="{{url('destination/update')}}" onBlur="saveToDatabase(this,'delivery_type','<?php echo $id; ?>')">{{ $user->delivery_type }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" data-url="{{url('destination/update')}}" onBlur="saveToDatabase(this,'delivery_name','<?php echo $id; ?>')">{{ $user->delivery_name }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" data-url="{{url('destination/update')}}" onBlur="saveToDatabase(this,'short_name','<?php echo $id; ?>')">{{ $user->short_name }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" data-url="{{url('destination/update')}}" onBlur="saveToDatabase(this,'address_1','<?php echo $id; ?>')">{{ $user->address_1	 }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" data-url="{{url('destination/update')}}" onBlur="saveToDatabase(this,'address_2','<?php echo $id; ?>')">{{ $user->address_2 }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" data-url="{{url('destination/update')}}" onBlur="saveToDatabase(this,'pincode','<?php echo $id; ?>')">{{ $user->pincode }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" data-url="{{url('destination/update')}}" onBlur="saveToDatabase(this,'city','<?php echo $id; ?>')">{{ $user->city }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" data-url="{{url('destination/update')}}" onBlur="saveToDatabase(this,'district','<?php echo $id; ?>')">{{ $user->district }}</td>
                                        <td contentEditable='true' onClick="showEdit(this,1);">
                                        
                                            <span>{{ $user->state }}</span>
                                            <select name="state" id="state-edit" class="form-control" style="display:none" onChange="updateField(this,{{$id}})">
                                                <option value="">Select State</option>
                                                @foreach($state as $_state)
                                                <option value="{{$_state}}" @if($_state == $user->state) selected @endif>{{$_state}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td contentEditable='true' onClick="showEdit(this);" data-url="{{url('destination/update')}}" onBlur="saveToDatabase(this,'mobile_1','<?php echo $id; ?>')">{{ $user->mobile_1 }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" data-url="{{url('destination/update')}}" onBlur="saveToDatabase(this,'mobile_2','<?php echo $id; ?>')">{{ $user->mobile_2 }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" data-url="{{url('destination/update')}}" onBlur="saveToDatabase(this,'email_1','<?php echo $id; ?>')">{{ $user->email_1 }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" data-url="{{url('destination/update')}}" onBlur="saveToDatabase(this,'email_2','<?php echo $id; ?>')">{{ $user->email_2 }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" data-url="{{url('destination/update')}}" onBlur="saveToDatabase(this,'gstin','<?php echo $id; ?>')">{{ $user->gstin }}</td>
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

		function showEdit(editableObj,flag) {
			$(editableObj).css("background","#FFF");
            if(flag == '1'){
                $(editableObj).find('span').hide();
                $(editableObj).find('select').show();
            }
		} 
        function updateField(that,id){
            var current_value = $(that).val();
            console.log(current_value);
            var field = $(that).attr('name');
            saveToDatabase(that,field,id,current_value);
           
        }
		
		function saveToDatabase(editableObj,column,id,value) {
            var url = $(editableObj).attr('data-url');
            var id = id;
            var column = column;
            var changed_val = editableObj.innerHTML;
            if(value) changed_val = value;
            var table = "destinations";
           // alert(changed_val);
                $.ajax({
                type:'POST', 
                url:url, 
                //data:'_token=<?php //echo csrf_token() ?>',
                data:{id:id,column:column,changed_val:changed_val,table:table,"_token": "{{ csrf_token() }}"},
                success:function(response){ 
                    // console.log(response);return false;
                    if(response.error){
                        var err = '';
                        $.each(response.error,function(k,v){
                            err +=  v+"\n";
                        });
                        alert(err);
                        location.reload();
                    }else if(response.success){
                        location.reload();
                    }
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

    
   
    </script>

<!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delivery Location Details</h4>
        </div>
        <div class="modal-body">
      <!--<form name="myform" id="myform" method="post">-->
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        
        <div class="form-group">
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Delivery Type</label>
            <div class="col-sm-9">
              <input type="text" name="delivery_type" id="delivery_type" placeholder="Delivery Type" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Delivery Name</label>
            <div class="col-sm-9">
              <input type="text" name="delivery_name" id="delivery_name" placeholder="Delivery Name" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Short Name</label>
            <div class="col-sm-9">
              <input type="text" name="short_name" id="short_name" placeholder="Short Name" class="form-control">
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
            <label class="col-sm-3 control-label" for="textinput">City</label>
            <div class="col-sm-9">
              <input type="text" name="city" id="city" placeholder="City" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">District</label>
            <div class="col-sm-9">
              <input type="text" name="district" id="district" placeholder="District" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">State</label>
            <div class="col-sm-9">
             <select name="state" id="state" class="form-control">
                <option value="">Select State</option>
                @foreach($state as $_state)
                <option value="{{$_state}}">{{$_state}}</option>
                @endforeach
             </select>
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
            <label class="col-sm-3 control-label" for="textinput">GSTIN</label>
            <div class="col-sm-9">
              <input type="text" name="gstin" id="gstin" placeholder="GSTIN" class="form-control">
            </div>
          </div><br>
        <!--</form>-->
        </div>
        <div class="modal-footer">
        <input type='submit' class="btn btn-success" id="upddestinations" value="Insert Details" data-url="{{url('destination')}}"/>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->


</body>
<script>
    $(document).ready(function() {
        $("#upddestinations").click(function(){
            var url = $(this).attr('data-url');
            var delivery_type = $("#delivery_type").val();
            var delivery_name = $("#delivery_name").val();
            var short_name = $("#short_name").val();
            var address_1 = $("#address_1").val();
            var address_2 = $("#address_2").val();
            var pincode = $("#pincode").val();
            var city = $("#city").val();
            var district = $("#district").val();
            var state = $("#state").val();
            var mobile_1 = $("#mobile_1").val();
            var mobile_2 = $("#mobile_2").val();
            var email_1 = $("#email_1").val();
            var email_2 = $("#email_2").val();
            var gstin = $("#gstin").val();
            
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
                data:{delivery_type:delivery_type,delivery_name:delivery_name,short_name:short_name,address_1:address_1,address_2:address_2,pincode:pincode,city:city,district:district,state:state,mobile_1:mobile_1,mobile_2:mobile_2,email_1:email_1,email_2:email_2,gstin:gstin,"_token": "{{ csrf_token() }}"},
                success:function(response){ 
                    if(response.error){
                        var err = '';
                        var counter = 0;
                        var fieldname = "";
                        $.each(response.error,function(k,v){
                            if(counter==0)
                            {
                                fieldname = k;
                            }
                            err +=  v+"\n";
                            counter++;
                        });
                        alert(err);
                        if(fieldname!=0)
                        {
                            $("select[name='"+fieldname+"']").focus();
                            $("input[name='"+fieldname+"']").focus();
                        }
                        return false;
                    }else if(response.success){
                        location.reload();
                    }
                    //alert(response);
                    // location.reload();
                } 
            
            }); 
           // }
        });
    }); 
</script>
</html>
