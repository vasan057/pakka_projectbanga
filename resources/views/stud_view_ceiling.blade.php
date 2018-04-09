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
            
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12"><br><br>
                <div class="panel panel-default">
                    <div class="panel-body" style="color:#9A1031"><Strong>Ceilings Details</Strong></div>
                </div>
                    <div class='col-md-12'>
                    <!--<button style="float: right;" class="btn btn-danger" id='modal' data-toggle="modal" data-target="#myModal1">Add Record</button>   -->
                    
                    <button style="margin-left:  10px;margin-right: 10px;float: right;" id='notify_all' class="btn btn-warning">Notify All</button> 
                    
                    <button style="margin-left:  10px;margin-right: 10px;float: right;" onClick="UNfreezeAll('{{url('getUNFall')}}')" id='unfreeze_all' class="btn btn-danger">UnFreeze All</button>
                    <button style="margin-left:  10px;margin-right: 10px;float: right;" onClick="freezeAll('{{url('getFall')}}')" id='freeze_all' class="btn btn-success">Freeze All</button>
                        
                    <button style="margin-left:  10px;margin-right: 10px;float: right;" data-toggle="modal" data-target="#myModal_setall" id='set_all' class="btn btn-primary">Set All</button> 
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
                           
                            <table style= "width:100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr bgcolor="#9A1031">
                                        <th class="custom_color">Mandi Name</th>
                                        <th class="custom_color">Date</th>
                                        <th class="custom_color">Quantity</th>
                                        <th class="custom_color">Price min</th>
                                        <th class="custom_color">Price Max</th>
                                        <th class="custom_color">Avg Buying</th>
                                        <th class="custom_color">Avg Agmark</th>
                                        <th class="custom_color">Modal Price</th>
                                        <th class="custom_color">Suggested Price</th>
                                        <th class="custom_color">Ceiling Price</th>
                                        
                                       <!-- <th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count=1;
                                $ids = '';
                                $isFrozen = '';
                                $count1 = 0;
                                ?>
                                @foreach ($users as $user)
                                <?php
                                $id= $user->id ; 
                                $isFrozen = $user->isFrozen;
                              
                                $ids =  $ids.'##'.$user->id;
                                ?>

                                    <tr class="odd gradeX">                                     
                                        <td>{{ $user->mandi_name }}<input type='hidden' id='<?php echo $count1 ?>' value='{{ $user->mandi_id }}'/></td>
                                        
                                        <td>{{ $user->date }}</td>
                                        <td>{{ $user->quantity }}</td>
                                        <td>{{ $user->min }}</td>
                                        <td>{{ $user->max }}</td>
                                        <td>{{ $user->Avg_Buying }}</td>
                                        <td>{{ $user->Avg_Agmark }}</td>
                                        <td>{{ $user->Modal_Price }}</td>
                                        <td>{{ $user->Suggested_Price }}</td> 
                                        <td>{{ $user->Suggested_Price }}</td> 
                                    <?php
                                    $count1++;   
                                    ?>
                                    </tr>
                                    <?php /*if($count==1)
                                    {$count=2;}
                                    else
                                    {$count=1;}*/
                                    ?>
                                    
                                    @endforeach 
                                </tbody>
                                <input type ='hidden' id = 'mandi_id'>
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

		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,id) {
            var id = id;
            var column = column;
            var changed_val = editableObj.innerHTML;
            var table = "users_basic";
           // alert(changed_val);
                $.ajax({
                type:'POST', 
                url:'/test_dev/public/getupd', 
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

        function freezeAll(url) {
            var id = $('#mandi_id').val();
            var column = 'isFrozen';
            var table = "mandi_daily_price";
            id = id.split('##');

            var a = confirm("Are You Sure You want to Freeze All?");
            if(a == true){
                for(var i= 0; i<id.length;i++){
               //alert(id[i]); 
                    $.ajax({
                        type:'POST', 
                        url:url, 
                        data:{id:id[i],column:column,table:table,"_token": "{{ csrf_token() }}"},
                        success:function(response){ 
                        //$("#ajaxResponse").html(data.msg); 
                    //if(response == "success")
                           // alert(response);
                            location.reload();
                        } 
                    });
                }
            }
           // alert(id);   
		}

        function UNfreezeAll(url) {
            var id = $('#mandi_id').val();
            var column = 'isFrozen';
            var table = "mandi_daily_price";
            id = id.split('##');

            var a = confirm("Are You Sure You want to UnFreeze All?");
            if(a == true){
                for(var i= 0; i<id.length;i++){
                    $.ajax({
                        type:'POST', 
                        url:url, 
                        data:{id:id[i],column:column,table:table,"_token": "{{ csrf_token() }}"},
                        success:function(response){ 
                        //$("#ajaxResponse").html(data.msg); 
                    //if(response == "success")
                            //alert(response);
                            location.reload();
                        } 
                    }); 
                }
            }
           // alert(id);   
		}

        function SetAll(url) {
            var id = $('#mandi_id').val();
            id = id.split('##');

           // var a = prompt("Please Enter Ceiling Price");
            var a= $('#setall_price').val();
            if(a!='' && a!=null){
                for(var i= 0; i<id.length;i++){
                //alert(a);
                $.ajax({
                    type:'POST', 
                    url:url, 
                    //data:'_token=<?php //echo csrf_token() ?>',
                    data:{mandi_id:id[i],ceiling_price:a,"_token": "{{ csrf_token() }}"},
                    success:function(response){ 
                    
                       // alert(response);
                        location.reload();
                    } 
                
                }); 
                }
            } 
		}
		</script>
    <script>
    $(document).ready(function() {
        var madi = '<?php echo $ids ?>';
        $('#mandi_id').val(madi.substring(2, madi.length));
        var isfroflag = '<?php echo $isFrozen ?>';
        if(isfroflag == 0){
            $("#notify_all").attr("disabled", true);
            $("#set_all").attr("disabled", true);
            $("#unfreeze_all").attr("disabled", true);
        }
        else if(isfroflag == 1){
            $("#notify_all").attr("disabled", true);
            $("#freeze_all").attr("disabled", true);
        }

        $('#dataTables-example').DataTable({
            responsive: false
           
        });

       // $("#freeze_all").attr("disabled", true);
    });

    function showEdit(editableObj) {
        $(editableObj).css("background","#FFF");
    } 
   
    </script>




<!-- Modal -->
<div class="modal fade" id="myModal_setall" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Set Ceiling Price</h4>
        </div>
        <div class="modal-body">
      <!--<form name="myform" id="myform" method="post">-->
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        
        <div class="form-group">
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Set Price</label>
            <div class="col-sm-9">
              <input type="text" name="setall_price" id="setall_price" placeholder="Set Price" class="form-control">
            </div>
          </div><br><br>
        <!--</form>-->
        </div>
        <div class="modal-footer">
        <input type='submit' class="btn btn-success" id="updceiling" onClick="SetAll('{{url('getinsertCeiling')}}')" value="Set Ceiling Price" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->

</body>
<script>
    $(document).ready(function() {
        $("#updusers").click(function(){

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

            if(user_id==""){alert("hi");return false;}
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
            else{
                $.ajax({
                type:'POST', 
                url:'/lsapp/public/getinsertuser', 
                //data:'_token=<?php //echo csrf_token() ?>',
                data:{user_id:user_id,password:password,mobile_1:mobile_1,mobile_2:mobile_2,address_1:address_1,address_2:address_2,pincode:pincode,gstin:gstin,roles_id:roles_id,email_1:email_1,email_2:email_2,active:active,"_token": "{{ csrf_token() }}"},
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
