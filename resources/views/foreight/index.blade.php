@extends('layouts.main')
@section('content')
<div id="page-wrapper" style="min-height: 208px;height: 1145px; ">
    <div class="row">
        <div class="col-lg-12"><br><br>
        <div class="panel panel-default">
            <div class="panel-body" style="color:#264595"><Strong>For Freight Details</Strong></div>
        </div>
            
            <button style="float: right;" class="btn btn-norm" data-type="insert" id='modal' data-url="{{url('forreight')}}" data-toggle="modal" data-target="#myModal" >Add Record</button>    
        <br><br>  </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                     <table style= "width:100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr bgcolor="#264595">
                                        <th class="custom_color">Mandi Name</th>
                                        <th class="custom_color">Delivery Loc.</th>
                                        <th class="custom_color">Group ID</th>
                                        <th class="custom_color">Freight Value</th>
                                        <th class="custom_color">Valid From</th>
                                        <th class="custom_color">Valid To</th>
                                        <th class="custom_color">Edit</th>
                                       <!-- <th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count=1;?>
                                @foreach ($forfreights as $forfreight)
                                <?php
                                $id= $forfreight->id ; 
                               
                               
                                ?>

                                    <tr class="odd gradeX">                                     
                                       
                                        <td contentEditable='false' >{{ $forfreight->mandis->short_name or ''  }}</td>
                                        <td contentEditable='false' >{{ $forfreight->destinations->short_name or ''  }}</td>
                                        <td contentEditable='false' >{{ $forfreight->gid or ''  }}</td>
                                        <td contentEditable='false' >{{ $forfreight->freight_value or ''  }}</td>
                                        <td contentEditable='false' >{{ $forfreight->valid_from or ''  }}</td>
                                        <td contentEditable='false' >{{ $forfreight->valid_to or '' }}</td>
                                        <td ><a href="javascript:://" data-target="#myModal" data-toggle="modal" data-type="edit" class="edit-modal" data-id="{{$forfreight->id}}" data-update="{{url('forreight/update/'.$forfreight->id)}}" data-url="{{url('forreight/for-reight-details/'.$forfreight->id)}}">Edit</a></td>
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
@include('foreight._modal')
@endpush
@push('script')

    <script src="{{ asset('theme/vendor/metisMenu/metisMenu.min.js') }}"></script>
    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('theme/vendor/raphael/raphael.min.js') }}"></script>
    

    <!-- Custom Theme JavaScript -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="{{ asset('theme/dist/js/sb-admin-2.js') }}"></script>
<script src="{{asset('js/foreight/index.js?d='.time())}}"></script>
@endpush
