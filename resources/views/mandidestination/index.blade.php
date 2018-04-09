@extends('layouts.main')
@section('content')
<div id="page-wrapper" style="min-height: 208px;height: 1145px; ">
    <div class="row">
        <div class="col-lg-12"><br><br>
        <div class="panel panel-default">
            <div class="panel-body" style="color:#264595"><Strong>Mandi Destination Details</Strong></div>
        </div>
            
            <button style="float: right;" class="btn btn-norm" data-type="insert" id='modal' data-url="{{url('mandidestination')}}" data-toggle="modal" data-target="#myModal" >Add Record</button>    
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
                                <th class="custom_color">Mandi Name</th>
                                <th class="custom_color">Delivery Location</th>
                                <th class="custom_color">Active</th>
                                <th class="custom_color">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count=1;?>
                        @foreach ($mandidestinations as $mandidestination)
                        <?php
                        $id= $mandidestination->id ; 
                        
                        
                        ?>

                            <tr class="odd gradeX">                                     
                                
                                <td contentEditable='false'>{{ $mandidestination->mandi->short_name or '' }}</td>
                                <td contentEditable='false'>{{ $mandidestination->destination->short_name or '' }}</td>
                               <td>{{ $mandidestination->active == 1 ? 'Active':'Inactive'}}</td>
                                <td ><a href="javascript:://" data-target="#myModal" data-toggle="modal" data-type="edit" class="edit-modal" data-id="{{$mandidestination->id}}" data-update="{{url('mandi-destination-update/'.$mandidestination->id)}}" data-url="{{url('mandidestination/mandi-destination-details/'.$mandidestination->id)}}">Edit</a></td>
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
@include('mandidestination._modal')
@endpush
@push('script')
<script src="{{asset('js/mandidestination/index.js?d='.time())}}"></script>
@endpush
