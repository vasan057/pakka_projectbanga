@extends('layouts.main')
@section('content')
<div id="page-wrapper" style="min-height: 208px;height: 1145px; ">
    <div class="row">
        <div class="col-lg-12"><br><br>
        <div class="panel panel-default">
            <div class="panel-body" style="color:#264595"><Strong>User Role Mapping Details</Strong></div>
        </div>
            
            <button style="float: right;" class="btn btn-norm" data-type="insert" id='modal' data-url="{{url('role-manager')}}" data-toggle="modal" data-target="#myModal" >Add Record</button>    
        <br><br>  </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @php $order = Request::input('order')?0:1; @endphp
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr bgcolor="#264595">
                            <th class="custom_color">Role</th>
                            <th class="custom_color">Device</th>
                            <th class="custom_color">Menu</a></th>
                            <th class="custom_color">Status</th>
                            <th class="custom_color">Action</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count=1;?>
                        @foreach ($role_mappings as $role_map)
                            <tr class="odd gradeX">                                     
                                <td>{{ $role_map->role->role or '' }}</td>
                                <td>{{$role_map->device_name or ''}}</td>
                                <td>{{$role_map->raw_menu}}</td>
                                <td>{{$role_map->status}}</td>
                                <td >   
                                    <a href="javascript:://" data-target="#myModal" data-toggle="modal" data-type="edit" class="edit-modal" data-id="{{$role_map->id}}" data-update="{{url('role-manager/update/'.$role_map->id)}}" data-url="{{url('role-manager/show/'.$role_map->id)}}">Edit</a>
                                    |&nbsp;
                                    <a href="{{url('role-manager/status/'.$role_map->id)}}">{{$role_map->status_button or ''}}</a>
                            
                                </td>
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
@include('role_manager._modal')
@endpush
@push('script')
<script src="{{asset('js/role_manager/index.js?d='.time())}}"></script>
@endpush
