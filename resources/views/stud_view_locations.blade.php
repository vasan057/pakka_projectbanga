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
                    <div class="panel-body" style="color:#9A1031"><Strong>Location Details</Strong></div>
                </div>
                    
                    <button style="float: right;" class="btn btn-danger" id='modal' data-toggle="modal" data-target="#myModal1">Add Record</button>    
               <br><br>  </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" id="events-table-wrapper">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    @php $states  = App\Model\State::pluck('state_name') @endphp
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           
                            <table style= "width:100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead class="header">
                                    <tr bgcolor="#9A1031">
                                        <th class="custom_color">State</th>
                                        <th class="custom_color">District</th>
                                        <th class="custom_color">City</th>
                                        <th class="custom_color">Status</th>                                        
                                       <!-- <th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count=1;?>
                                @foreach ($locations as $location)
                                <?php
                                $id= $location->id ; 
                                $District=$location->District;
                                $Town_City=$location->Town_City;
                               
                                ?>

                                    <tr class="odd gradeX">                                     
                                        <td contentEditable='true' onClick="showEdit(this,1);" onBlur="selectBlur(this)">
                                            <span>{{ $location->State }}</span>
                                            <select onChange="updateField(this,{{$id}},'{{url('getupdall')}}')" name="State" class="for-control" style="display:none">
                                                    <option value="">Select state</option>
                                                    @foreach($states as $state)
                                                    <option value="{{$state}}" @if($location->State == $state) selected @endif>{{$state}}</option>
                                                    @endforeach
                                            </select>
                                        </td>
                                        
                                        <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'District','<?php echo $id; ?>','<?php echo $District;?>','{{url('getupdall')}}')">{{ $location->District }}</td>
                                        <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'Town_City','<?php echo $id; ?>','<?php echo $Town_City;?>','{{url('getupdall')}}')">{{ $location->Town_City }}</td>
                                        <td contentEditable='true' onClick="showEdit(this,1);">
                                            <span>{{ trans('general.'.$location->is_active) }}</span>
                                            <select onChange="updateField(this,{{$id}},'{{url('getupdall')}}')" name="is_active" class="for-control" style="display:none">
                                                <option value="1" @if($location->is_active == '1') selected @endif>Active</option>
                                                <option value="0" @if($location->is_active == '0') selected @endif>InActive</option>
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
    <script src="{{asset('js/table-fixed-header.js')}}"></script>

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

		function showEdit(editableObj,flag) {
            $(editableObj).css("background","#FFF");
            if(flag == '1'){
                $(editableObj).find('span').hide();
                $(editableObj).find('select').show();
            }
		} 
        function updateField(that,id,url){
            var current_value = $(that).val();
            console.log(current_value);
            var field = $(that).attr('name');
            saveToDatabase(that,field,id,current_value,url,true);
           
        }
		function selectBlur(editableObj){
            console.log()
        }
		function saveToDatabase(editableObj,column,id,value,url,select) {
            var id = id;
            var column = column;
            var changed_val = editableObj.innerHTML;
            if(select) changed_val = value;
            //if(value) changed_val = value;
            var table = "locations";
            // if(changed_val==value)
            // {
            //     location.reload();
            // }
            //alert("id="+id+",column="+column+",changed_val="+changed_val);
                $.ajax({
                type:'POST', 
                url:url, 
                //data:'_token=<?php //echo csrf_token() ?>',
                data:{id:id,column:column,changed_val:changed_val,table:table,"_token": "{{ csrf_token() }}"},
                success:function(response){ 
                    console.log(response);
                    // return false;
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

   
    </script>

<!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Location Details</h4>
        </div>
        <div class="modal-body">
      <form name="myform" id="myform" method="post" class="form-horizontal">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="textinput">State</label>
                <div class="col-sm-9">
                    <select name="State" id="State" class="form-control">
                        <option value="">Select state</option>
                        @foreach($states as $state)
                        <option value="{{$state}}">{{$state}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="textinput">District</label>
                <div class="col-sm-9">
                    <input type="text" name="District" id="District" placeholder="District" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="textinput">City</label>
                <div class="col-sm-9">
                <input type="text" name="Town_City" id="Town_City" placeholder="City" class="form-control">
                </div>
            </div>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Activity</label>
            <div class="col-sm-9">
                <select name="is_active" id="is_active" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
                </select>
            </div>
          </div>
          </div>
        </form>
        <div class="clearfix"></div>
        
        </div>
        <div class="modal-footer">
        <input type='submit' class="btn btn-success" id="updlocation" data-url="{{url('location')}}" value="Insert Details" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->


</body>
<script>
    $(document).ready(function() {
        // $('.table').fixedHeader({
        //     topOffset: 0

        // });
        $("#updlocation").click(function(){

            var State = $("#State").val();
            var District = $("#District").val();
            var Town_City = $("#Town_City").val();
            var is_active = $("#is_active").val();
          
            var url = $(this).attr('data-url');
            
                $.ajax({
                type:'POST', 
                url:url, 
                data:{State:State,District:District,Town_City:Town_City,is_active:is_active,"_token": "{{ csrf_token() }}"},
                success:function(response){ 
                    if(response.error){
                        var err = '';
                        var counter = 0;
                        var fieldname = "";
                        $.each(response.error,function(k,v)
                        {
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
        });
    }); 
</script>
</html>
