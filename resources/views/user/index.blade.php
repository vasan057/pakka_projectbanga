@extends('layouts.main')
@section('content')
<div id="page-wrapper" style="min-height: 208px;height: 1145px;">
    <div class="row">
        <div class="col-lg-12"><br><br>
        <div class="panel panel-default">
            <div class="panel-body" style="color:#264595"><Strong>User Details</Strong></div>
        </div>
            
            <button style="float: right;" class="btn btn-norm" data-type="insert" id='modal' data-url="{{url('users')}}" data-toggle="modal" data-target="#myModal" >Add Record</button>    
        <br><br>  </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead class="header">
                            <tr bgcolor="#264595">
                            <th class="custom_color">User ID</th>
                            <th class="custom_color">Email 1</th>
                            <th class="custom_color">Mobile 1</th>
                            <th class="custom_color">Pincode</th>
                            <th class="custom_color">Gstin</th>
                            <th class="custom_color">Role</th>
                            <th class="custom_color">Edit</th>
                               
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
                                
                                <td contentEditable='false'>{{ $user->user_id or '' }}</td>
                                <td contentEditable='false'>{{ $user->email_1 or '' }}</td>
                                <td contentEditable='false'>{{ $user->mobile_1 or '' }}</td>
                                <td contentEditable='false'>{{ $user->pincode or '' }}</td>
                                <td contentEditable='false'>{{ $user->gstin or '' }}</td>
                                <td contentEditable='false'>{{ $user->role->role or '' }}</td>
                               
                                <td ><a href="javascript:://" data-target="#myModal" data-toggle="modal" data-type="edit" class="edit-modal" data-id="{{$user->id}}" data-update="{{url('users/update/'.$user->id)}}" data-url="{{url('users/user-details/'.$user->id)}}">Edit</a></td>
                            </tr>
                            
                            
                            @endforeach 
                        </tbody>
                    </table>
                    {{$users->links()}}
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
@include('user._modal')
@endpush
@push('script')
<script src="{{asset('js/user/index.js?d='.time())}}"></script>
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