@extends('layouts.main')
@section('content')
<div id="page-wrapper" style="min-height: 208px;height: 1145px;">
<div class="clearfix">&nbsp;</div>
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">
                    <strong>{{ session('message') }}</strong>
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-body" style="color:#264595">
                    <div class="col-md-6">
                        <strong>Manage Offers</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="">
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
        <div class="col-md-6">
            <div class="col-md-6">
            <button class="btn btn-danger pull-right" id="submit-all" data-status="2" data-url="{{url('offer/accept')}}">Accept All</button>
                
            </div>
            <div class="col-md-6 pull-right">
                <button class="btn btn-danger pull-right" data-toggle="modal" data-url="{{url('offer')}}" data-type="insert" data-target="#myModal">Add new Offer</button>
            </div>
        </div>
            
        </div>
    </div>
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="row" id="events-table-wrapper">
        <div class="col-lg-12">
            <!-- <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                    Dropup
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div> -->
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                <table style= "width:100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead class="header">
                        <tr bgcolor="#264595">
                            <th class="custom_color"><input type="checkbox" class="checkall"></th>
                            <th class="custom_color">Order Number</th>
                            <th class="custom_color">Mandi Name</th>
                            <th class="custom_color">Pakka Arthiya</th>
                            <th  class="custom_color">Reference Number</th>
                            <th  class="custom_color">Offer Reference Number</th>
                            <th class="custom_color">Delivery Location</th>
                            <th class="custom_color">Base Price</th>
                            <th class="custom_color">Quantity</th>
                            <th class="custom_color">FOR Price</th>
                            <th class="custom_color">Counter Offer Price</th>
                            <th class="custom_color">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($offers as $offer)
                        <tr class="odd gradeX"> 
                        <td><input type="checkbox" name="orders[]" value="{{$offer->id}}"></td>
                        <td>{{$offer->order_number or ''}}</td>            
                        <td>{{$offer->mandi->short_name or ''}}</td>                        
                        <td>{{$offer->pakka_arthiya->user_id or ''}}</td>                        
                        <td>{{$offer->ref_num or ''}}</td>                        
                        <td>{{$offer->offer_number or ''}}</td>                        
                        <td>{{$offer->destination->short_name or ''}}</td>                        
                        <td>{{$offer->order_price or ''}}</td>                        
                        <td>{{$offer->order_quantity or ''}}</td>                        
                        <td>{{$offer->order_for_price or ''}}</td>                        
                            <td>
                                @if($offer->counter_price || $offer->status != 0)
                                    {{$offer->counter_price}}
                                @else
                                <a href="javascript://" 
                                    data-url="{{url('offer/'.$offer->id)}}" 
                                    data-location="{{url('mandi/mandi-by-destination')}}"
                                    data-type="edit" 
                                    data-toggle="modal"
                                    data-target="#myModal"
                                    class="btn btn-danger">Update couter price</a>
                                @endif
                            </td>
                            <td>
                                @if($offer->status == 0)
                                    <button data-id="{{$offer->id}}" href="javascript://" data-url="{{url('offer/accept')}}" class="btn btn-danger individual-submit">Accept</button>
                                    <button data-id="{{$offer->id}}" href="javascript://" data-url="{{url('offer/reject')}}" class="btn btn-danger individual-submit">Reject</button> 
                                @else
                                    {{$offer->status_offer or ''}}
                                @endif
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
                {{$offers->appends(request()->query())->links()}}
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
@include('offer._modal_admin')
@endpush

@push('script')
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="{{asset('js/offer/index.js?d='.time())}}"></script>
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
<link href="{{asset('table-fixed-header.css')}}" rel="stylesheet">
@endpush