@extends('layouts.main')
@section('content')
<div id="page-wrapper" style="min-height: 208px;height: 1145px; ">
    <div class="row">
        <div class="col-lg-12"><br><br>
        <div class="panel panel-default">
            <div class="panel-body" style="color:#264595"><Strong>Competitor Details</Strong></div>
        </div>
            
            <button style="float: right;" class="btn btn-norm" data-type="insert" id='modal' data-url="{{url('competitor')}}" data-toggle="modal" data-target="#myModal" >Add Record</button>    
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
                        <thead class="header">
                            <tr bgcolor="#264595">
                            <th class="custom_color">Buyer Name</th>
                            <th class="custom_color">Other Details</th>
                            <th class="custom_color">Short Code</th>
                            <th class="custom_color">Sort Order</th>
                            <th class="custom_color">Edit</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count=1;?>
                        @foreach ($competitors as $competitor)
                        <?php
                        $id= $competitor->id ; 
                        
                        
                        ?>

                            <tr class="odd gradeX">                                     
                                
                                <td contentEditable='false'>{{ $competitor->buyer_name or '' }}</td>
                                <td contentEditable='false'>{{ $competitor->other_detail or '' }}</td>
                                <td contentEditable='false'>{{ $competitor->short_code or '' }}</td>
                                <td contentEditable='false'>{{ $competitor->short_order or '' }}</td>
                              
                                <td ><a href="javascript:://" data-target="#myModal" data-toggle="modal" data-type="edit" class="edit-modal" data-id="{{$competitor->id}}" data-update="{{url('competitor/update/'.$competitor->id)}}" data-url="{{url('competitor/competitor-details/'.$competitor->id)}}">Edit</a></td>
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
@include('competitor._modal')
@endpush
@push('script')
<script src="{{asset('js/competitor/index.js?d='.time())}}"></script>
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
