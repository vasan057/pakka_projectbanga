@extends('layouts.main')
@section('content')
<div id="page-wrapper" style="min-height: 208px;height: 1145px;">
    <div class="row">
        <div class="col-lg-12"><br><br>
        <div class="panel panel-default">
            <div class="panel-body" style="color:#264595"><Strong>Mandi Details</Strong></div>
        </div>
            
            <button style="float: right;" class="btn btn-norm" data-type="insert" id='modal' data-url="" data-toggle="modal" data-target="#myModal" >Add Record</button>    
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
                        <thead class="header">
                            <tr bgcolor="#264595">
                                    <th class="custom_color">Short Name</th>
                                <th class="custom_color">Mandi Name</th>
                                <th class="custom_color">Agmark ID</th>
                                <th class="custom_color">Location</th>
                                <th class="custom_color">Address 1</th>
                                <th class="custom_color">Address 2</th>
                                <th class="custom_color">Pincode</th>
                                <th class="custom_color">Edit</th>
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
                                
                                <td contentEditable='false' onClick="showEdit(this);" onBlur="saveToDatabase(this,'short_name','<?php echo $id; ?>','{{url('getupd')}}')">{{ $mandi->short_name }}</td>
                                
                                <td contentEditable='false' onClick="showEdit(this);" onBlur="saveToDatabase(this,'mandi_name','<?php echo $id; ?>','{{url('getupd')}}')">{{$mandi->mandi_name or ''}}</td> 
                                <td onClick="getagmark_market_id(this,'<?php echo $id; ?>','{{url('getdropdownmandiagmark')}}');" >
                                {{$mandi->agmark->market_name or '' }}
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
                                <span id='<?php echo "location_id".$id; ?>' >{{$_final_list or ''}}|{{ $mandi->pincode  }}</span>
                                
                                </td>
                                <td contentEditable='false' onClick="showEdit(this);" onBlur="saveToDatabase(this,'address_1','<?php echo $id; ?>','{{url('getupd')}}')">{{ $mandi->address_1 }}</td>
                                <td contentEditable='false' onClick="showEdit(this);" onBlur="saveToDatabase(this,'address_2','<?php echo $id; ?>','{{url('getupd')}}')">{{ $mandi->address_2 }}</td>
                                <td contentEditable='false' onClick="showEdit(this);" onBlur="saveToDatabase(this,'pincode','<?php echo $id; ?>','{{url('getupd')}}')">{{ $mandi->pincode }}</td>
                                <td ><a href="javascript:://" data-target="#myModal" data-toggle="modal" data-type="edit" class="edit-modal" data-id="{{$mandi->id}}" data-update="{{url('mandi/update/'.$mandi->id)}}" data-url="{{url('mandi/mandi-details/'.$mandi->id)}}">Edit</a></td>
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
@endsection
@push('modal')
@include('mandi._modal')
@endpush
@push('script')
<script src="{{asset('js/mandi/index.js?d='.time())}}"></script>
<script src="{{asset('js/table-fixed-header.js')}}"></script>
<script>
    $(function(){
        $('.table').fixedHeader({
            topOffset: 0

        });

    });
</script>
@endpush
@push('style')
<link href="{{asset('table-fixed-header.css')}}" rel="stylesheet">
@endpush
