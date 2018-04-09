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
                    <div class="panel-body" style="color:#264595"><Strong>FOR Line Items</Strong></div>
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
                                        <th class="custom_color">Parameter</th>
                                        <th class="custom_color">Group</th>
                                        <th class="custom_color">Data Type</th>
                                        <th class="custom_color">Sequence</th>
                                        <th class="custom_color">Base</th>
                                        <th class="custom_color">Value</th>
                                        <th class="custom_color">Valid From</th>
                                        <th class="custom_color">Valid To</th>
                                        <th class="custom_color">Edit</th>
                                       <!-- <th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count=1;?>
                                @foreach ($forlineitems as $forlineitem)
                                <?php
                                $id= $forlineitem->id ; 
                               
                               
                                ?>

                                    <tr class="odd gradeX">                                     
                                       
                                        <td contentEditable='false' >{{ $forlineitem->parameter or ''  }}</td>
                                        <td contentEditable='false' >{{ $forlineitem->group or ''  }}</td>
                                        <td contentEditable='false' >{{ $forlineitem->data_type or ''  }}</td>
                                        <td contentEditable='false' >{{ $forlineitem->sequence or ''  }}</td>
                                        <td contentEditable='false' >{{ $forlineitem->base or ''  }}</td>
                                        <td contentEditable='false' >{{ $forlineitem->value or ''  }}</td>
                                        <td contentEditable='false' >{{ $forlineitem->valid_from or ''  }}</td>
                                        <td contentEditable='false' >{{ $forlineitem->valid_to or '' }}</td>
                                        <td contentEditable='false' ><a href="javascript:://" class="edit-modal" data-update="{{url('for-line-items/'.$forlineitem->id)}}" data-id="{{$forlineitem->id}}" data-url="{{url('for-line-items/'.$forlineitem->id)}}">Edit</a></td>
                                    </tr>
                                  
                                    @endforeach 
                                </tbody>
                            </table>
                            {{$forlineitems->links()}}
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
                $("#myModal1 .modal-title").html('FOR Line Items Details');
                $("#myModal1 #updusermandi").val('FOR Line Items Details');
            }else{
                $("#myModal1 form").append("<input type='hidden' name='_method' value='put'>");
                $("#myModal1 .modal-title").html('Update Freight Details');
                $("#myModal1 #updusermandi").val('Update Details');
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
<div class="modal fade" id="myModal1" role="dialog" data-url="{{url('for-line-items')}}">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">FOR Line Items Details</h4>
        </div>
        <div class="modal-body">
      <form name="myform" id="myform" method="post" action="{{url('for-line-items')}}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        <div class="form-group">
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Parameter</label>
            <div class="col-sm-9">
            <input type="text" id="parameter" name="parameter" class="form-control"/>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Group</label>
            <div class="col-sm-9">
            <input type="text" id="group" name="group" class="form-control"/>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Data Type</label>
            <div class="col-sm-9">
            <select id="data_type" name="data_type" class="form-control">
                <option value="flat">Flat</option>
                <option value="perc">Perc</option>
                <option value="total">Total</option>
            </select>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Sequence</label>
            <div class="col-sm-9">
            <input type="text" id="sequence" name="sequence" onkeypress="return (event.charCode >= 48 && event.charCode <= 57 || event.charCode == 8 || event.charCode == 46)" class="form-control"/>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Base</label>
            <div class="col-sm-9">
            <input type="text" id="base" name="base" class="form-control"/>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Value</label>
            <div class="col-sm-9">
            <input type="text" id="value" name="value" class="form-control"/>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Valid From</label>
            <div class="col-sm-9">
            <input type="text" id="valid_from" name="valid_from" class="form-control" readonly/>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Valid TO</label>
            <div class="col-sm-9">
            <input type="text" id="valid_to" name="valid_to" class="form-control" readonly/>
            </div>
          </div><br>
        </form>
        </div>
        <div class="modal-footer">
        <input type='button' class="btn btn-success" id="updusermandi" value="Insert Details" />
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
        $( function() {
            //$( "#valid_from" ).datepicker();
            $( "#valid_from" ).datepicker({ dateFormat: "dd-mm-yy" }).val();
            $( "#valid_to" ).datepicker({ dateFormat: "dd-mm-yy" }).val();
            //$( "#valid_to" ).datepicker();
        } );
        $("#updusermandi").click(function(){

           var data = $("#myModal1 form").serializeArray();
           var url = $("#myModal1 form").attr('action');
           
                $.ajax({
                type:'POST', 
                url: url, 
                //data:'_token=<?php //echo csrf_token() ?>',
                data: data,
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
                            err += v+"\n";
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
                } 
            
            }); 
        });
    }); 
</script>
</html>
