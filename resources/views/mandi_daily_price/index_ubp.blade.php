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
        <div class="panel panel-default">
            <div class="panel-body" style="color:#264595">
                <div class="col-md-6">
                    <strong>Arrival Data Details</strong>
                </div>
            </div>
        </div>
       
       
        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>
        <div class="panel panel-default">
        <div class="panel-body">
           
            <div class="col-md-4 col-sm-4 col-xs-6">
                <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                    <span></span> <b class="caret"></b>
                </div>
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