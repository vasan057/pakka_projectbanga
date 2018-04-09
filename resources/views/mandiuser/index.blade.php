@extends('layouts.main')
@section('content')
<div id="page-wrapper" style="min-height: 208px;height: 1145px; ">
    <div class="row">
        <div class="col-lg-12"><br><br>
        <div class="panel panel-default">
            <div class="panel-body" style="color:#264595"><Strong>Mandi - User Mapping</Strong></div>
        </div>
            
            <button style="float: right;" class="btn btn-norm" data-type="insert" id='modal' data-url="{{url('mandiusermap')}}" data-toggle="modal" data-target="#myModal" >Add Record</button>    
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
                                        <th class="custom_color">User name</th>
                                        <th class="custom_color">Mandi name</th>
                                        <th class="custom_color">Active</th>
                                        <th class="custom_color">Edit</th>
                                       <!-- <th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count=1;?>
                                @foreach ($users as $user)
                                <?php
                                $id= $user->id ; 
                               
                               
                                ?>

                                    <tr class="odd gradeX">                                     
                                       
                                        <td contentEditable='false' >{{ $user->user->user_id or ''  }}</td>
                                        <td contentEditable='false' >{{ $user->mandi->short_name or '' }}</td>
                                        <td contentEditable='false' >{{trans('general.'.$user->active)}}</td>
                                        <td ><a href="javascript:://" data-target="#myModal" data-toggle="modal" data-type="edit" class="edit-modal" data-id="{{$user->id}}" data-update="{{url('mandiusermap/update/'.$user->id)}}" data-url="{{url('mandiusermap/mandi-user-details/'.$user->id)}}">Edit</a></td>
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
@include('mandiuser._modal')
@endpush
@push('script')
<script src="{{asset('js/mandiuser/index.js?d='.time())}}"></script>
@endpush
