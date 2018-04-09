@extends('layouts.main')
@section('content')
<div id="page-wrapper" style="min-height: 208px;height: 1145px; ">
    <div class="row">
        <div class="col-lg-12"><br><br>
        <div class="panel panel-default">
            <div class="panel-body" style="color:#264595"><Strong>State Details</Strong></div>
        </div>
            
            <button style="float: right;" class="btn btn-norm" data-type="insert" id='modal' data-url="{{url('state')}}" data-toggle="modal" data-target="#myModal" >Add Record</button>    
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
                            <th class="custom_color">State Name</th>
                            <th class="custom_color">Sort Order</th>
                            <th class="custom_color">Short Name</th>
                            <th class="custom_color">Status</th>
                            <th class="custom_color">Edit</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count=1;?>
                        @foreach ($states as $state)
                        <?php
                        $id= $state->id ; 
                        
                        
                        ?>

                            <tr class="odd gradeX">                                     
                                
                                <td contentEditable='false'>{{ $state->state_name or '' }}</td>
                                <td contentEditable='false'>{{ $state->sort_order or '' }}</td>
                                <td contentEditable='false'>{{ $state->short_name or '' }}</td>
                                <td contentEditable='false'>
                                @if($state->status == '1') Active @endif
                                @if($state->status == '0')InActive @endif
                                </td>
                                <td ><a href="javascript:://" data-target="#myModal" data-toggle="modal" data-type="edit" class="edit-modal" data-id="{{$state->id}}" data-update="{{url('state/update/'.$state->id)}}" data-url="{{url('state/state-details/'.$state->id)}}">Edit</a></td>
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
@include('state._modal')
@endpush
@push('script')
<script src="{{asset('js/state/index.js?d='.time())}}"></script>
@endpush
