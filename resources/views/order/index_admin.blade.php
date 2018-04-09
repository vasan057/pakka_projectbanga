@extends('layouts.main')
@section('content')
<div id="page-wrapper" style="min-height: 208px;height: 1145px;">
        <input type="hidden" name="from-order" id="from-order" value="{{$from}}">
        <input type="hidden" name="to-order" id="to-order" value="{{$to}}">
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
                        <strong>Manage Orders</strong>
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
           <div class="col-md-9">
           <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                <span></span> <b class="caret"></b>
            </div>
           </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
                @if($status == '0')
                    <button class="btn btn-norm pull-right" id="submit-all" data-status="1" data-url="{{url('order/submit')}}">Submit All</button>
                @endif
                @if($status == '1')
                    <button class="btn btn-norm pull-right" id="submit-all" data-status="2" data-url="{{url('order/accept')}}">Accept All</button>
                @endif
                
            </div>
            
        </div>
            
        </div>
    </div>
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="row" id="events-table-wrapper">
        <div class="col-lg-12">
        <ul class="nav nav-pills nav-justified">
                <li @if($status == '0') class="active" @endif><a href="{{url('order?status=0')}}"><img style="height:2em;width:2em;" src="/lsapp/resources/views/icons/Saved.png"></img>&nbsp&nbspSaved</a></li>
                <li @if($status == '1') class="active" @endif><a href="{{url('order?status=1')}}"><img style="height:2em;width:2em;" src="/lsapp/resources/views/icons/Submitted.png"></img>&nbsp&nbspSubmitted</a></li>
                <li @if($status == '2') class="active" @endif><a href="{{url('order?status=2')}}"><img style="height:2em;width:2em;" src="/lsapp/resources/views/icons/Accepted.png"></img>&nbsp&nbspAccepted</a></li>
            </ul>
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                <table style= "width:100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead class="header">
                        <tr bgcolor="#264595">
                            <th class="custom_color"><input type="checkbox" class="checkall"></th>
                            <th class="custom_color">Order Number<a href="?sort=order_number&order={{$order or 0}}"></a></th>
                            <th class="custom_color">Order Date</th>
                            <th class="custom_color">Mandi Name<a href="?sort=mandi_name&order={{$order or 0}}"></a></th>
                            <th class="custom_color">Pakka Arthiya<a href="?sort=pakka_arthiya&order={{$order or 0}}"></a></th>
                            <th class="custom_color">Reference Number<a href="?sort=ref_number&order={{$order or 0}}"></a></th>
                            <th class="custom_color">Delivery Location<a href="?sort=delivery_loc&order={{$order or 0}}"></a></th>
                            <th class="custom_color">Base Price<a href="?sort=base_price&order={{$order or 0}}"></a></th>
                            <th class="custom_color">Quantity<a href="?sort=quantity&order={{$order or 0}}"></a></th>
                            <th class="custom_color">FOR Price<a href="?sort=for_price&order={{$order or 0}}"></a></th>
                            <th class="custom_color">Counter Offer Price<a href="?sort=counter_price&order={{$order or 0}}"></a></th>
                            <th class="custom_color">Submit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr class="odd gradeX"> 
                        <td><input type="checkbox" name="orders[]" value="{{$order->id}}"></td>
                        <td>{{$order->order_number or ''}}</td>         
                        <td>{{$order->order_date or ''}}</td>        
                        <td>{{$order->mandi->short_name or ''}}</td>                        
                        <td>{{$order->pakka_arthiya->user_id or ''}}</td>                        
                        <td>{{$order->ref_num or ''}}</td>                        
                        <td>{{$order->destination->short_name or ''}}</td>                        
                        <td>{{$order->order_price or ''}}</td>                        
                        <td>{{$order->order_quantity or ''}}</td>                        
                        <td>{{$order->order_for_price}}</td>                        
                        <td>{{$order->counter_price or ''}}</td>                        
                           
                            <td>
                                @if($status == '0')
                                    <a data-id="{{$order->id}}" href="javascript://" data-url="{{url('order/submit')}}" class="btn btn-norm individual-submit">Submit</a>
                                @endif
                                @if($status == '1')
                                    <a data-id="{{$order->id}}" href="javascript://" data-url="{{url('order/accept')}}" class="btn btn-norm individual-submit">Accept</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
                {{$orders->appends(request()->query())->links()}}
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
@include('order._modal')
@endpush

@push('script')
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="{{asset('js/order/index.js?d='.time())}}"></script>
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
.nav-pills{
    background-color:rgba(255,255,255,0.3);
}
</style>
@endpush