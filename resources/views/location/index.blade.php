@extends('layouts.main')
@section('content')
<div id="page-wrapper" style="min-height: 208px;height: 1145px; ">
    <div class="row">
        <div class="col-lg-12"><br><br>
        <div class="panel panel-default">
            <div class="panel-body" style="color:#264595"><Strong>Location Details</Strong></div>
        </div>
            
            <button style="float: right;" class="btn btn-norm" data-type="insert" id='modal' data-url="{{url('location')}}" data-toggle="modal" data-target="#myModal" >Add Record</button>    
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
                            <th class="custom_color">State</th>
                            <th class="custom_color">District</th>
                            <th class="custom_color">City</th>
                            <th class="custom_color">Status</th>
                            <th class="custom_color">Edit</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count=1;?>
                        @foreach ($locations as $location)
                        <?php
                        $id= $location->id ; 
                        
                        
                        ?>

                            <tr class="odd gradeX">                                     
                                
                                <td contentEditable='false'>{{ $location->State or '' }}</td>
                                <td contentEditable='false'>{{ $location->District or '' }}</td>
                                <td contentEditable='false'>{{ $location->Town_City or '' }}</td>
                                <td contentEditable='false'>
                                @if($location->is_active == '1') Active @endif
                                @if($location->is_active == '0')InActive @endif
                                </td>
                                <td ><a href="javascript:://" data-target="#myModal" data-toggle="modal" data-type="edit" class="edit-modal" data-id="{{$location->id}}" data-update="{{url('location/update/'.$location->id)}}" data-url="{{url('location/location-details/'.$location->id)}}">Edit</a></td>
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
@include('location._modal')
@endpush
@push('script')
<script src="{{asset('js/location/index.js?d='.time())}}"></script>
@endpush
