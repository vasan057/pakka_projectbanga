@extends('layouts.main')
@section('content')
<style type="text/css">
   /* .row {
    margin-right: -922px;
    margin-left: -15px;
}
.panel-body {
    padding: 15px;
    width: 100px;
}
.panel-default {
    background-color: rgba(255,255,255,0.3) !important;
    width: 1013px;
}
element.style {
    margin-left: 904px;
}*/
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12"><br><br>
        <div class="panel panel-default">
            <div class="" style="color:#264595;    padding: 17px;"><Strong>Delivery Details</Strong></div>
        </div>
            
            <button style="margin-left: 904px" class="btn btn-norm" data-type="insert" id='modal' data-url="{{url('destination')}}" data-toggle="modal" data-target="#myModal" >Add Record</button>    
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
                            <tr bgcolor="#264595">
                            <th class="custom_color">Delivery Type</th>
                            <th class="custom_color">Delivery Name</th>
                            <th class="custom_color">Short Name</th>
                            <th class="custom_color">Address 1</th>
                            <th class="custom_color">Pincode</th>
                            <th class="custom_color">City</th>
                            <th class="custom_color">District</th>
                            <th class="custom_color">State</th>
                            <th class="custom_color">Edit</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count=1;?>
                        @foreach ($destinations as $destination)
                        <?php
                        $id= $destination->id ; 
                        
                        
                        ?>

                            <tr class="odd gradeX">                                     
                                
                                <td contentEditable='false'>{{ $destination->delivery_type or '' }}</td>
                                <td contentEditable='false'>{{ $destination->delivery_name or '' }}</td>
                                <td contentEditable='false'>{{ $destination->short_name or '' }}</td>
                                <td contentEditable='false'>{{ $destination->address_1 or '' }}</td>
                                <td contentEditable='false'>{{ $destination->pincode or '' }}</td>
                                <td contentEditable='false'>{{ $destination->city or '' }}</td>
                                <td contentEditable='false'>{{ $destination->district or '' }}</td>
                                <td contentEditable='false'>{{ $destination->state or '' }}</td>
                                <td ><a href="javascript:://" data-target="#myModal" data-toggle="modal" data-type="edit" class="edit-modal" data-id="{{$destination->id}}" data-update="{{url('destination/update/'.$destination->id)}}" data-url="{{url('destination/destination-details/'.$destination->id)}}">Edit</a></td>
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
@include('destination._modal')
@endpush
@push('script')
<script src="{{asset('js/destination/index.js?d='.time())}}"></script>
@endpush
