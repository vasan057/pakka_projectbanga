@extends('layouts.main')
@section('content')
<div id="page-wrapper" style="min-height: 208px;height: 1145px;">
@php 
$freeze =  false;
$freeze_form = false;
if(count($mandi_prices)){
    $freezes = $mandi_prices->sum('isFrozen');
    if($freezes || $notified == 'yes'){
    $freeze = 'disabled';
    }
}

@endphp
<div class="clearfix">&nbsp;</div>
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
                <strong>{{ session('message') }}</strong>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-success">
                <strong>{!! session('error') !!}</strong>
            </div>
        @endif
        @if ($freeze == 'disabled')
            <div class="alert alert-warning">
                <strong>Dear User, UBP Team has frozen/ Notified ceiling price.</strong>
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-body" style="color:#264595">
                <div class="col-md-6">
                    <strong>Arrival Data Details</strong>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <form class="form-inline" action="{{url('mandi-daily-price/excel-upload')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                <label for="exampleInputName2">Select File</label>
                    <input type="file" class="form-control " id="file" name="file" {{$freeze}}>
                </div>
                <button id="uploading" type="submit" class="btn btn-default" {{$freeze}}>Upload</button>
            </form>
        </div>
       
        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>
        <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-2 pull-left">
                @php 
                $date= date('Y-m-d');
                    $from = isset($_GET['from'])?$_GET['from']:$date;
                    $to = isset($_GET['to'])?$_GET['to']:$date;
                    $disable = '';
                    if(date('Y-m-d',strtotime($from)) != $date){
                        $freeze="disabled";
                        $disable='disabled';
                    } 

                @endphp
                <button class="btn btn-norm pull-left {{$disable}}" {{$disable}} id="submit-record" data-url="{{url('mandi-daily-price/update-submit')}}" {{$freeze}}>Submit All </button>  
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6">
                <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                    <span></span> <b class="caret"></b>
                </div>
            </div>
            <div class="col-md-3 pull-right">
                <button class="btn btn-norm pull-right" id="new-price" data-toggle="modal" data-target="#myModal" data-url="{{url('mandi-daily-price')}}" data-type="insert" {{$freeze}}>Add new </button>
            </div>
        </div>
        </div>
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
                                    <th class="custom_color">Mandi Name</th>
                                        <th class="custom_color">Minimum Price</th>
                                        <th  class="custom_color">Maximum Price</th>
                                        <th class="custom_color">Quantity</th>
                                        <th class="custom_color">is Submitted</th>
                                        <th class="custom_color">Date</th>
                                        <th class="custom_color">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                                    @foreach($mandi_prices as $mandi_price)
                                    <tr class="odd gradeX">                                     
                                        <td>{{ $mandi_price->mandi->short_name or '' }}</td>
                                        <td>{{ $mandi_price->min }}</td>
                                        <td>{{ $mandi_price->max }}</td>
                                        <td>{{ $mandi_price->quantity or ''	 }}</td>
                                        <td>{{ trans('submit.'.$mandi_price->isSubmit) }}</td>
                                        <td>{{ $mandi_price->date }}</td>
                                        <td>
                                            <a href="javascript://" id="edit" data-id="{{ $mandi_price->id }}" data-url="{{url('mandi-daily-price/'.$mandi_price->id)}}" data-type="edit" @if(!$freeze) data-toggle="modal" @endif  data-target="#myModal">Edit</a>
                                            
                                            @if($mandi_price->date == date('Y-m-d') && !$mandi_price->isSubmit) |
                                            <a @if($freeze != 'disabled') href="{{url('mandi-daily-price/submit/'.$mandi_price->id)}}" @endif >Submit</a>
                                            
                                            @endif
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
</div>
@endsection
@push('modal')
@include('mandi_daily_price._modal')
@endpush
@push('style')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link href="{{asset('table-fixed-header.css')}}" rel="stylesheet">
@endpush
@push('script')
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="{{asset('js/mandi_daily_price/index.js')}}"></script>
<script src="{{asset('js/table-fixed-header.js')}}"></script>
<script>
    $(function(){
        $('.table').fixedHeader({
            topOffset: 0

        });

    });
</script>
@endpush