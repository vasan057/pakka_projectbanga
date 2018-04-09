@extends('layouts.main')
@section('content')
<div id="page-wrapper" style="width: 1242px;min-height: 208px;height: 1145px;">
    <div class="row">
        <div class="col-lg-12"><br><br>
            <div class="panel panel-default">
                <div class="panel-body" style="color:#264595"><Strong>Agmarknet Data</Strong></div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="panel panel-default">
        <div class="panel-body">

        <div class="col-md-6">
           <div class="col-md-8">
           <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                <span></span> <b class="caret"></b>
            </div>
           </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        @if ($errors->has('file'))
            <div class="alert alert-danger">
                <strong>{{ $errors->first('file') }}</strong>
            </div>
        @endif
        @if ($errors->has('extension'))
            <div class="alert alert-danger">
                <strong>{{ $errors->first('extension') }}</strong>
            </div>
        @endif
        @if (session('message'))
            <div class="alert alert-success">
                <strong>{!! session('message') !!}</strong>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                <strong>{!! session('error') !!}</strong>
            </div>
        @endif
        <div class="col-md-6">
            <form class="form-inline" action="{{url('agmarknet-upload/excel-upload')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                <label for="exampleInputName2">Select File</label>
                    <input type="file" class="form-control" id="file" name="file">
                </div>
                <button type="submit" class="btn btn-default">Upload</button>
            </form>
        </div>
       
        <div class="clearfix">&nbsp;</div>
        
        <div class="clearfix">&nbsp;</div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row" id="events-table-wrapper">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           
                            <table style= "width:100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead class="header">
                                    <tr bgcolor="#264595">
                                        <th class="custom_color">Market place Name</th>
                                        <th class="custom_color">State</th>
                                        <th  class="custom_color">District</th>
                                        <th class="custom_color">Commodity</th>
                                        <th class="custom_color">Variety</th>
                                        <th class="custom_color">Grade</th>
                                        <th class="custom_color">Minimum</th>
                                        <th class="custom_color">Maximum</th>
                                        <th class="custom_color">Modal</th>
                                        <th class="custom_color">Date</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                               
                                    @foreach($agmarknets as $agmarknet)
                                    <tr class="odd gradeX">                                     
                                        <td>{{ $agmarknet->agmarkmaster->market_name or '' }}</td>
                                        <td>{{ $agmarknet->state_name or '' }}</td>
                                        <td>{{ $agmarknet->district_name or '' }}</td>
                                        <td>{{ $agmarknet->commodity }}</td>
                                        <td>{{ $agmarknet->variety }}</td>
                                        <td>{{ $agmarknet->grade or ''	 }}</td>
                                        <td>{{ $agmarknet->ag_min or ''	 }}</td>
                                        <td>{{ $agmarknet->ag_max or ''	 }}</td>
                                        <td>{{ $agmarknet->modal or ''	 }}</td>                                
                                        <td>{{ $agmarknet->date_arrival or ''	 }}</td>                                
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                            {{$agmarknets->links()}}
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
</div>
@endsection
@push('modal')
@include('agmarknet._modal')
@endpush
@push('script')
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="{{asset('js/agmarknet/index.js')}}"></script>
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
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<style>
.nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover{
    background-color: #9A1031;
}
</style>
<link href="{{asset('table-fixed-header.css')}}" rel="stylesheet">
@endpush