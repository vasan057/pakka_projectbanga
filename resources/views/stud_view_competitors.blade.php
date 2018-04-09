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
                    <div class="panel-body" style="color:#264595"><Strong>Buyer/Competitors</Strong></div>
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
                                        <th class="custom_color">Buyer Name</th>
                                        <th class="custom_color">Other Details</th>
                                        <th class="custom_color">Short Code</th>
                                        <th class="custom_color">Sort Order</th>
                                        
                                       <!-- <th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count=1;?>
                                @foreach ($users as $user)
                                <?php
                                $id= $user->id ; 
                                $buyer_name= $user->buyer_name ; 
                                $other_detail= $user->other_detail ; 
                                $short_code= $user->short_code ; 
                                $short_order= $user->short_order ; 
                               
                               
                                ?>

                                    <tr class="odd gradeX">                                     
                                        <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'buyer_name','<?php echo $id; ?>','<?php echo $buyer_name; ?>','{{url('getupdall')}}')">{{ $user->buyer_name }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'other_detail','<?php echo $id; ?>','<?php echo $other_detail; ?>','{{url('getupdall')}}')">{{ $user->other_detail }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'short_code','<?php echo $id; ?>','<?php echo $short_code; ?>','{{url('getupdall')}}')">{{ $user->short_code }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'short_order','<?php echo $id; ?>','<?php echo $short_order; ?>','{{url('getupdall')}}')">{{ $user->short_order }}</td>
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

		function showEdit(editableObj) {
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
           
            var id = id;
            var column = column;
            var changed_val = editableObj.innerHTML;
            var table = "competitors";
           // alert(changed_val);
           if(column=='buyer_name' && changed_val=="")
            {
                alert("Please enter Buyer Name");
                return false;
            } 
            if(column=='buyer_name' && usrid.test(changed_val) == false)
            {
                alert("Please enter valid Buyer Name");
                return false;
            }
            if(column=='short_code' && changed_val=="")
            {
                alert("Please enter Short Code");
                return false;
            } 
            if(column=='short_code' && name.test(changed_val) == false)
            {
                alert("Please enter valid Short Code");
                return false;
            }
            if(column=='short_order' && changed_val=="")
            {
                alert("Please enter Sort Order");
                return false;   
            } 
            if(column=='short_order' && num.test(changed_val) == false)
            {
                alert("Please enter valid Sort Order");
                return false;
            }
            if(changed_val==userid)
            {
                location.reload();
            }
            else{
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
          <h4 class="modal-title">Buyer/Competitors</h4>
        </div>
        <div class="modal-body">
      <!--<form name="myform" id="myform" method="post">-->
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        
        <div class="form-group">
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Buyer Name</label>
            <div class="col-sm-9">
              <input type="text" name="buyer_name" id="buyer_name" placeholder="Buyer Name" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Other Details</label>
            <div class="col-sm-9">
              <input type="text" name="other_detail" id="other_detail" placeholder="Other Details" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Short Code</label>
            <div class="col-sm-9">
              <input type="text" name="short_code" id="short_code" placeholder="Short Code" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Sort Order</label>
            <div class="col-sm-9">
              <input type="text" name="short_order" id="short_order" placeholder="Sort Order" class="form-control">
            </div>
          </div><br>
        <!--</form>-->
        </div>
        <div class="modal-footer">
        <input type='submit' class="btn btn-success" id="updcompetitors" data-url="{{url('getinsertcompetitor')}}" value="Insert Details" />
          <button type="button" class="btn btn-norm" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->


</body>
<script>
    $(document).ready(function() {
        $("#updcompetitors").click(function(){

            var url = $(this).attr('data-url');

            var buyer_name = $("#buyer_name").val();
            var other_detail = $("#other_detail").val();
            var short_code = $("#short_code").val();
            var short_order = $("#short_order").val();
           

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

            if(buyer_name=="")
            {
                alert("Please enter Buyer Name");
                $("#buyer_name").focus();
                return false;
            }
            else if(usrid.test(buyer_name) == false  && buyer_name !='')
            {
                alert("Please enter valid Buyer Name");
                $("#buyer_name").focus();
                return false;
            }
            else if(short_code=="")
            {
                alert("Please enter Short Code");
                $("#short_code").focus();
                return false;
            }
            else if(name.test(short_code) == false  && short_code !='')
            {
                alert("Please enter valid Short Code");
                $("#short_code").focus();
                return false;
            }
            else if(short_order=="")
            {
                alert("Please enter Sort Order");
                $("#short_order").focus();
                return false;
            }
            else if(num.test(short_order) == false  && short_order !='')
            {
                alert("Please enter valid Sort Order");
                $("#short_order").focus();
                return false;
            }
            else{
                $.ajax({
                type:'POST', 
                url:url, 
                //data:'_token=<?php //echo csrf_token() ?>',
                data:{buyer_name:buyer_name,other_detail:other_detail,short_code:short_code,short_order:short_order,"_token": "{{ csrf_token() }}"},
                success:function(response){ 
                
                    //alert(response);
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
