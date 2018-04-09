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
#dataTables-example_wrapper table tr td select{
    display:none;
}
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
                    <div class="panel-body" style="color:#9A1031"><Strong>Mandi Details</Strong></div>
                </div>
                    
                    <button style="float: right;" class="btn btn-danger" id='modal' data-toggle="modal" data-target="#myModal" data-url="{{url('getdropdownuser')}}" data-url1="{{url('getdropdownlocation')}}" data-url2="{{url('getdropdowncity')}}" data-url3="{{url('getdropdowndistrict')}}" data-url4="{{url('getdropdownstate')}}" data-url5="{{url('getdropdownmandiagmark')}}">Add Record</button>    
               <br><br>  </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr bgcolor="#9A1031">
                                            <th class="custom_color">Short Name</th>
                                        <th class="custom_color">Mandi Name</th>
                                        <th class="custom_color">Agmark ID</th>
                                        <th class="custom_color">Location</th>
                                        <th class="custom_color">Address 1</th>
                                        <th class="custom_color">Address 2</th>
                                        <th class="custom_color">Pincode</th>
                                        {{--  <th class="custom_color">City</th>
                                        <th class="custom_color">District</th>
                                        <th class="custom_color">State</th>
                                        <th class="custom_color">User ID</th>  --}}
                                       <!-- <th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count=1;?>
                                @foreach ($mandis as $mandi)
                                <?php
                                $id= $mandi->id ; 
                                
                               
                                ?>

                                    <tr class="odd gradeX">                                     
                                        
                                        <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'short_name','<?php echo $id; ?>','{{url('getupd')}}')">{{ $mandi->short_name }}</td>
                                        
                                        <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'mandi_name','<?php echo $id; ?>','{{url('getupd')}}')">{{$mandi->mandi_name or ''}}</td> 
                                        <td onClick="getagmark_market_id(this,'<?php echo $id; ?>','{{url('getdropdownmandiagmark')}}');" >
                                        <span id='<?php echo "agmark_market_id".$id; ?>' >{{$mandi->agmark->agmark_market_id or '' }}</span>
                                        <select id='<?php echo "_agmark_market_id".$id; ?>' onchange="saveToDatabase(this,'agmark_market_id','<?php echo $id; ?>','{{url('getupd')}}')"> 
					                    </select>
                                        </td>
                                        <td onClick="getlocation_id(this,'<?php echo $id; ?>','{{url('getdropdownlocation')}}');" >
                                        @php 
                                        $_state = isset($mandi->location->State) ? $mandi->location->State :'';
                                        $_city = isset($mandi->location->Town_City) ?$mandi->location->Town_City:'';
                                        $_dist = isset($mandi->location->District)?$mandi->location->District:'';
                                        $_list = [$_state,$_city,$_dist];
                                        $_list = array_filter($_list);
                                        $_final_list =  !empty($_list) ? implode(' | ',$_list):'';
                                        @endphp
                                        <span id='<?php echo "location_id".$id; ?>' >{{$_final_list or ''}}</span>
                                        <select id='<?php echo "_location_id".$id; ?>' onchange="saveToDatabase(this,'location_id','<?php echo $id; ?>','{{url('getupd')}}')"> 
					                    </select>
                                        </td>
                                        <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'address_1','<?php echo $id; ?>','{{url('getupd')}}')">{{ $mandi->address_1 }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'address_2','<?php echo $id; ?>','{{url('getupd')}}')">{{ $mandi->address_2 }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'pincode','<?php echo $id; ?>','{{url('getupd')}}')">{{ $mandi->pincode }}</td>
                                       
                                    </tr>
                                 
                                    
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
        $('#dataTables-example tbody').on( 'click', 'td', function () {
            //alert('Data:'+$(this).html().trim());
            //alert('Row:'+$(this).parent().find('td').html().trim());
          //  alert('Column:'+$('#dataTables-example thead tr th').eq($(this).index()).html().trim());
            //if($('#dataTables-example thead tr th').eq($(this).index()).html().trim()=="Address 2")
            
            //alert("hi");
        });


		function saveToDatabase(editableObj,column,id,url) {

            var mail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var name=/^[A-Za-z ]+$/;
            var phon = /^\d{10}$/; 
            var pin = /^\d{6}$/; 
            //var num=/\D/;
            var num=/^[0-9]*$/;
            var decimalno=/^-?\d*(\.\d+)?$/;
            var addrs=/^[0-9a-zA-Z\s,-]+$/;
            var ifsc=/^[A-Za-z]{4}\d{7}$/;
            var grades=/[A-C][+-]?|D/;


            var id = id;
            var column = column;
            var changed_val = editableObj.innerHTML;
           // var changed_val = editableObj.innerHTML;
            if(column=='mandi_name' && changed_val=="")
            {
                alert("Please Enter the Mandi Name");
                return false;
            } 
            if(column=='mandi_name' && name.test(changed_val) == false)
            {
                alert("Please enter valid Mandi Name");
                return false;
            }
            if(column=='short_name' && changed_val=="")
            {
                alert("Please Enter the Short Name");
                return false;
            } 
            if(column=='short_name' && name.test(changed_val) == false)
            {
                alert("Please enter valid Short Name");
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
            if(column=='user_id')
            {
                changed_val = $("#_sp"+id).val();
            }  
            if(column=='state')
            {
                changed_val = $("#_state"+id).val();
            } 
            if(column=='district')
            {
                changed_val = $("#_district"+id).val();
            } 
            if(column=='city')
            {
                changed_val = $("#_city"+id).val();
            } 
            if(column=='location_id')
            {
                changed_val = $("#_location_id"+id).val();
            } 
            if(column=='agmark_market_id')
            {
                changed_val = $("#_agmark_market_id"+id).val();
            } 
            var table = "mandis";
            
           //alert(changed_val);
                 $.ajax({
                type:'POST', 
                url:url, 
                //data:'_token=<?php //echo csrf_token() ?>',
                data:{id:id,column:column,changed_val:changed_val,table:table,"_token": "{{ csrf_token() }}"},
                success:function(response){ 
                    if(response.error){
                        alert(response.error);
                        return false;
                    }else{
                        location.reload();
                    }
                //$("#ajaxResponse").html(data.msg); 
               //if(response == "success")
                    //alert(response);
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
        
        function getlocation_id(editableObj,id,url) {
			$(editableObj).css("background","#FFF");
            var curr_value = $(editableObj).find('span').text();
           
			$("#location_id"+id).hide();
			$("#_location_id"+id).show();
            $.ajax({
                type:'GET', 
                url:url, 
                //data:'_token=<?php //echo csrf_token() ?>',
                //data:{mandi_name:mandi_name,agmark_market_id:agmark_market_id,location_id:location_id,short_name:short_name,address_1:address_1,address_1:address_1,address_2:address_2,pincode:pincode,city:city,district:district,state:state,user_id:user_id,"_token": "{{ csrf_token() }}"},
                dataType: "json",
                success:function(response){ 
                    $("#_location_id"+id).empty();
                    $("#_location_id"+id).append('<option value="">--clear--</option>');
                    $.each(response, function(key, value) {
                        var selected = "";
                        var val = value.State+' | '+value.Town_City+' | '+value.District;
                        if(val == curr_value) {
                            selected = "selected";
                        }
                        //$('select[name="user_id"]').append('<option value="'+ key +'">'+ value.id +'</option>');
                        $("#_location_id"+id).append('<option value="'+ value.id +'" '+selected+'>'+ val +'</option>');
                    });
                } 
            
            }); 
		}

        function getagmark_market_id(editableObj,id,url) {
			$(editableObj).css("background","#FFF");
			var curr_value = $(editableObj).find('span').text();
			$("#agmark_market_id"+id).hide();
			$("#_agmark_market_id"+id).show();
            $.ajax({
                type:'GET', 
                url:url, 
                //data:'_token=<?php //echo csrf_token() ?>',
                //data:{mandi_name:mandi_name,agmark_market_id:agmark_market_id,location_id:location_id,short_name:short_name,address_1:address_1,address_1:address_1,address_2:address_2,pincode:pincode,city:city,district:district,state:state,user_id:user_id,"_token": "{{ csrf_token() }}"},
                dataType: "json",
                success:function(response){ 
                    $("#_agmark_market_id"+id).empty();
                    $("#_agmark_market_id"+id).append('<option value="">--clear--</option>');
                    $.each(response, function(key, value) {
                        var selected = "";
                        if(value.market_name == curr_value) {
                            selected = "selected";
                        }
                        //$('select[name="user_id"]').append('<option value="'+ key +'">'+ value.id +'</option>');
                        $("#_agmark_market_id"+id).append('<option value="'+ value.id +'" '+selected+' >'+ value.market_name +'</option>');
                    });
                } 
            
            }); 
		}
    </script>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Mandi Details</h4>
        </div>
        <div class="modal-body">
      <!--<form name="myform" id="myform" method="post">-->
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        
        <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Mandi Name</label>
            <div class="col-sm-9">
              <input type="text" name="mandi_name" id="mandi_name" placeholder="Mandi Name" class="form-control">
            </div><br><br>
            <!-- <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Agmark ID</label>
            <div class="col-sm-9">
             <input type="text" name="agmark_market_id" id="agmark_market_id" placeholder="Agmark ID" class="form-control">
              <select id="agmark_market_id" name="agmark_market_id" class="form-control">
              <option value=''>--clear--</option>
              </select>
            </div><br><br> -->
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Location ID</label>
            <div class="col-sm-9">
              <!--<input type="text" name="location_id" id="location_id" placeholder="Location ID" class="form-control">-->
              <select id="location_id" name="location_id" class="form-control">
              <option value=''>--clear--</option>
              @php $states = App\Model\Location::pluck('state','id'); @endphp
              @foreach($states as $key=>$value)
              <option value="{{$key}}">{{$value}}</option>
              @endforeach
              </select>
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
              <!--<input type="text" name="city" id="city" placeholder="City" class="form-control">-->
              <select id="city" name="city" class="form-control">
              <option value=''>--clear--</option>
              @php $states = App\Model\Location::pluck('Town_City','id'); @endphp
              @foreach($states as $key=>$value)
              <option value="{{$key}}">{{$value}}</option>
              @endforeach
              </select>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">District</label>
            <div class="col-sm-9">
              <!--<input type="text" name="district" id="district" placeholder="District" class="form-control">-->
              <select id="district" name="district" class="form-control">
              <option value=''>--clear--</option>
              @php $district = App\Model\Location::pluck('district','id'); @endphp
              @foreach($district as $key=>$value)
              <option value="{{$key}}">{{$value}}</option>
              @endforeach
              </select>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">State</label>
            <div class="col-sm-9">
              <!--<input type="text" name="state" id="state" placeholder="State" class="form-control">-->
              <select id="state" name="state" class="form-control">
              <option value=''>--clear--</option>
              @php $states = App\Model\Location::pluck('state','id'); @endphp
              @foreach($states as $key=>$value)
              <option value="{{$key}}">{{$value}}</option>
              @endforeach
              </select>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">User ID</label>
            <div class="col-sm-9">
             <!--  <input type="text" name="user_id" id="user_id" placeholder="User ID" class="form-control">-->
             <select id="user_id" name="user_id" class="form-control">
              <option value=''>--clear--</option>
              @php $user = App\Model\Usersbasic::pluck('user_id','id'); @endphp
              @foreach($user as $key=>$value)
              <option value="{{$key}}">{{$value}}</option>
              @endforeach
              </select>
            </div>
          </div><br>
        <!--</form>-->
        </div>
        <div class="modal-footer">
        <input type='submit' class="btn btn-success" id="updmandi" value="Insert Details" data-url="{{url('getinsert')}}" />
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
            //alert("hi");
            //For User ID
            var url = $(this).attr('data-url');
            var url1 = $(this).attr('data-url1');
            var url2 = $(this).attr('data-url2');
            var url3 = $(this).attr('data-url3');
            var url4 = $(this).attr('data-url4');
            var url5 = $(this).attr('data-url5');
            $('#user_id').show();
            $('#agmark_market_id').show();
            $('#location_id').show();
            $('#city').show();
            $('#district').show();
            $('#state').show();

        });
        $("#updmandi").click(function(){

            var url = $(this).attr('data-url');

            var mandi_name = $("#mandi_name").val();
            // var agmark_market_id = $("#agmark_market_id").val();
            var location_id = $("#location_id").val();
            var short_name = $("#short_name").val();
            var address_1 = $("#address_1").val();
            var address_2 = $("#address_2").val();
            var pincode = $("#pincode").val();
            var city = $("#city").val();
            var district = $("#district").val();
            var state = $("#state").val();
            var user_id = $("#user_id").val();
            var token = $("input[name='_token']").val();

            var mail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var name=/^[A-Za-z ]+$/;
            var phon = /^\d{10}$/; 
            var pin = /^\d{6}$/; 
            //var num=/\D/;
            var num=/^[0-9]*$/;
            var decimalno=/^-?\d*(\.\d+)?$/;
            var addrs=/^[0-9a-zA-Z\s,-]+$/;
            var ifsc=/^[A-Za-z]{4}\d{7}$/;
            var grades=/[A-C][+-]?|D/;
            if(mandi_name=="")
            {
                alert("Please Enter the Mandi Name");
                return false;
            }
            else if(name.test(mandi_name) == false  && mandi_name !='')
            {
                alert("Please enter valid Mandi Name");
                return false;
            }
            else if(short_name=="")
            {
                alert("Please Enter the Short Name");
                return false;
            }
            else if(name.test(short_name) == false  && short_name !='')
            {
                alert("Please enter valid Short Name");
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
            else{
                $.ajax({
                type:'POST', 
                url:url, 
                //data:'_token=<?php //echo csrf_token() ?>',
                data:{mandi_name:mandi_name,agmark_market_id:agmark_market_id,location_id:location_id,short_name:short_name,address_1:address_1,address_2:address_2,pincode:pincode,city:city,district:district,state:state,user_id:user_id,"_token": "{{ csrf_token() }}"},
                success:function(response){ 
                    //alert(response);
                    location.reload();
                } 
            
            }); 
            }
        });
    }); 
</script>
</html>
