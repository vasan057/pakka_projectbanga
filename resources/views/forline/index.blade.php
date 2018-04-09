@extends('layouts.main')
@section('content')
<div id="page-wrapper" style="min-height: 208px;height: 1145px; ">
    <div class="row">
        <div class="col-lg-12"><br><br>
        <div class="panel panel-default">
            <div class="panel-body" style="color:#264595"><Strong>For Line  Details</Strong></div>
        </div>
            
            <button style="float: right;" class="btn btn-norm" data-type="insert" id='modal' data-url="{{url('forline')}}" data-toggle="modal" data-target="#myModal" >Add Record</button>    
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
                            <th class="custom_color">Parameter</th>
                            <th class="custom_color">Group</th>
                            <th class="custom_color">Data Type</th>
                            <th class="custom_color">Sequence</th>
                            <th class="custom_color">Value</th>
                            <th class="custom_color">Valid From</th>
                            <th class="custom_color">Valid To</th>
                            <th class="custom_color">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count=1;?>
                        @foreach ($forlines as $forline)
                        <?php
                        $id= $forline->id ; 
                        
                        
                        ?>

                            <tr class="odd gradeX">                                     
                                
                                <td contentEditable='false'>{{ $forline->parameter or '' }}</td>
                                <td contentEditable='false'>{{ $forline->group or '' }}</td>
                                <td contentEditable='false'>{{ $forline->data_type or '' }}</td>
                                <td contentEditable='false'>{{ $forline->sequence or '' }}</td>
                                <td contentEditable='false'>{{ $forline->value or '' }}</td>
                                <td contentEditable='false'>{{ $forline->valid_from or '' }}</td>
                                <td contentEditable='false'>{{ $forline->valid_to or '' }}</td>
                                <td ><a href="javascript:://" data-target="#myModal" data-toggle="modal" data-type="edit" class="edit-modal" data-id="{{$forline->id}}" data-update="{{url('forline/update/'.$forline->id)}}" data-url="{{url('forline/for-line-details/'.$forline->id)}}">Edit</a></td>
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
@include('forline._modal')
@endpush
@push('script')

    <script src="{{ asset('theme/vendor/metisMenu/metisMenu.min.js') }}"></script>
    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('theme/vendor/raphael/raphael.min.js') }}"></script>
    

    <!-- Custom Theme JavaScript -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="{{ asset('theme/dist/js/sb-admin-2.js') }}"></script>
<script src="{{asset('js/forline/index.js?d='.time())}}"></script>
@endpush

