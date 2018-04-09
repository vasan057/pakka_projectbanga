@extends('layouts.main')
@section('content')
<div id="page-wrapper" style="min-height: 208px;height: 1145px; ">
    <div class="row">
        <div class="col-lg-12"><br><br>
        <div class="panel panel-default">
            <div class="panel-body" style="color:#264595"><Strong>For Agmark Master Details</Strong></div>
        </div>
            
            <button style="float: right;" class="btn btn-norm" data-type="insert" id='modal' data-url="{{url('agmark')}}" data-toggle="modal" data-target="#myModal" >Add Record</button>    
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
                            <th class="custom_color">Location</th>
                            <th class="custom_color">Market Name</th>
                            <th class="custom_color">Active</th>
                            <th class="custom_color">Edit</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count=1;?>
                        @foreach ($agmarks as $agmark)
                        <?php
                        $id= $agmark->id ; 
                        
                        
                        ?>

                            <tr class="odd gradeX">                                     
                                    @php 
                                        $_state = isset($agmark->location->State) ? $agmark->location->State :'';
                                        $_city = isset($agmark->location->Town_City) ?$agmark->location->Town_City:'';
                                        $_dist = isset($agmark->location->District)?$agmark->location->District:'';
                                        $_list = [$_state,$_city,$_dist];
                                        $_list = array_filter($_list);
                                        $_final_list =  !empty($_list) ? implode(' | ',$_list):'';
                                        @endphp
                                <td contentEditable='false'>{{ $_final_list or '' }}</td>
                                <td contentEditable='false'>{{ $agmark->market_name or '' }}</td>
                                <td contentEditable='false'>{{$agmark->active}}
                                
                                </td>
                                <td ><a href="javascript:://" data-target="#myModal" data-toggle="modal" data-type="edit" class="edit-modal" data-id="{{$agmark->id}}" data-update="{{url('agmark/update/'.$agmark->id)}}" data-url="{{url('agmark/agmark-details/'.$agmark->id)}}">Edit</a></td>
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
@include('agmark._modal')
@endpush
@push('script')
<script src="{{asset('js/agmarks/index.js?d='.time())}}"></script>
@endpush
