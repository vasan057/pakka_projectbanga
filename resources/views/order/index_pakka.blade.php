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
                <div class="panel-body" style="color:#264595;">
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
           <div class="col-md-8">
           <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                <span></span> <b class="caret"></b>
            </div>
           </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-6">
              
                
            </div>
            <div class="col-md-6 pull-right">
                <button class="btn btn-norm pull-right" data-toggle="modal" data-url="{{url('order')}}" data-type="insert" data-target="#myModal">Add new order</button>
            </div>
        </div>
            
        </div>
    </div>
    </div>
    <div class="col-md-12">
            <div class="col-md-6"></div>
            <div class="col-md-12" style="display:none;">
                <form action="" method="get" id="search" class="pull-right">
                        @php 
                        $q = isset($_GET) ? $_GET:[];
                        if(isset($q['order']) || isset($q['sort'])){
                            unset($q['order']);
                            unset($q['sort']);
                        } 
                        $query = http_build_query($q);
                        $order = Request::input('order')?0:1;
                    @endphp
                    @foreach($q as $key=>$_q)
                    @if($key != 'q')
                     <input type="hidden" name="{{$key}}" value="{{$_q}}">
                    @endif
                    @endforeach
                    <input type="text" id="search-input" name="q" placeholder="Search.." value="{{$_GET['q'] or ''}}">
                    <button type="submit" class="btn btn-sm btn-info" title="Please enter valid Mandi, PA, Order Number, or Delivery Loc">Search</button>
                    <button type="button" onclick="$('#search-input').val('');$('#search').submit();"  class="btn btn-sm btn-warning">Reset</button>
                </form>
            </div>
        </div>
    <div class="clearfix">&nbsp;</div>
    <div class="row" id="events-table-wrapper">
        <div class="col-lg-12">
        <ul class="nav nav-pills nav-justified">
                <li @if($status == '0') class="active" @endif><a href="{{url('order?status=0')}}">Saved</a></li>
                <li @if($status == '1') class="active" @endif><a href="{{url('order?status=1')}}">Submitted</a></li>
                <li @if($status == '2') class="active" @endif><a href="{{url('order?status=2')}}">Accepted</a></li>
            </ul>
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body  table-scroll">
                <table style= "width:100%" class="table table-striped table-bordered table-scroll table-hover" id="dataTables-example">
                    <thead class="header">
                        <tr bgcolor="#264595">
                                <th class="custom_color"><input type="checkbox" class="checkall"></th>
                                {{-- <th class="custom_color">Order Number<a href="?{{$query}}&sort=order_number&order={{$order or 0}}"><i class="fa fa-caret-down" style="color:white;"></i></a></th>
                                <th class="custom_color">Order Type<a href="?{{$query}}&sort=order_type&order={{$order or 0}}"><i class="fa fa-caret-down" style="color:white;"></i></a></th>
                                <th class="custom_color">Order Date<a href="?{{$query}}&sort=order_date&order={{$order or 0}}"><i class="fa fa-caret-down" style="color:white;"></i></a></th></th>
                                <th class="custom_color">Mandi Name<a href="?{{$query}}&sort=mandi_id&order={{$order or 0}}"><i class="fa fa-caret-down" style="color:white;"></i></a></th>
                                <th class="custom_color">Pakka Arthiya<a href="?{{$query}}&sort=user_id&order={{$order or 0}}"><i class="fa fa-caret-down" style="color:white;"></i></a></th>
                                <th class="custom_color">Reference Number<a href="?{{$query}}&sort=ref_num&order={{$order or 0}}"><i class="fa fa-caret-down" style="color:white;"></i></a></th>
                                <th class="custom_color">Delivery Location<a href="?{{$query}}&sort=destination_id&order={{$order or 0}}"><i class="fa fa-caret-down" style="color:white;"></i></a></th>
                                <th class="custom_color">Base Price<a href="?{{$query}}&sort=order_price&order={{$order or 0}}"><i class="fa fa-caret-down" style="color:white;"></i></a></th>
                                <th class="custom_color">Quantity<a href="?{{$query}}&sort=order_quantity&order={{$order or 0}}"><i class="fa fa-caret-down" style="color:white;"></i></a></th>
                                <th class="custom_color">FOR Price<a href="?{{$query}}&sort=order_for_price&order={{$order or 0}}"><i class="fa fa-caret-down" style="color:white;"></i></a></th>
                                <th class="custom_color">Counter Offer Price<a href="?{{$query}}&sort=counter_price&order={{$order or 0}}"><i class="fa fa-caret-down" style="color:white;"></i></a></th>
                                <th class="custom_color">Created By<a href="?{{$query}}&sort=created_by&order={{$order or 0}}"><i class="fa fa-caret-down" style="color:white;"></i></a></th> --}}
                                <th class="custom_color">Order Number</th>
                                <th class="custom_color">Order Type</th>
                                <th class="custom_color">Order Date</th>
                                <th class="custom_color">Mandi Name</th>
                                <th class="custom_color">Pakka Arthiya</th>
                                <th class="custom_color">Reference Number</th>
                                <th class="custom_color">Delivery Location</th>
                                <th class="custom_color">Base Price</th>
                                <th class="custom_color">Quantity</th>
                                <th class="custom_color">FOR Price</th>
                                <th class="custom_color">Counter Offer Price</th>
                                <th class="custom_color">Created By</th>
                                <th class="custom_color">Save</th>
                                <th class="custom_color">Submit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr class="odd gradeX"> 
                        <td><input type="checkbox" name="orders[]" value="{{$order->id}}"></td>
                        <td>{{$order->order_number or ''}}</td>  
                        <td>{{$order->order_type or ''}}</td>           
                        <td>{{$order->order_date or ''}}</td>       
                        <td>{{$order->mandi->short_name or ''}}</td>                        
                        <td>{{$order->pakka_arthiya->user_id or ''}}</td>                        
                        <td>{{$order->ref_num or ''}}</td>                        
                        <td>{{$order->destination->short_name or ''}}</td>                        
                        <td>{{$order->order_price or ''}}</td>                        
                        <td>{{$order->order_quantity or ''}}</td>                        
                        <td>{{round($order->order_for_price,2)}}</td>                        
                        <td>{{$order->counter_price or ''}}</td>

                        <td>{{$order->user->user_id or ''}}</td>                        
                            <td>
                                @if($status == '0' && $order->created_by == Auth::user()->id)
                                    <a href="javascript://" 
                                    data-url="{{url('order/'.$order->id)}}" 
                                    data-location="{{url('mandi/mandi-by-destination')}}"
                                    data-type="edit" 
                                    data-toggle="modal"
                                    data-target="#myModal"
                                    class="btn btn-norm">Save</a>
                                @endif
                            </td>
                            <td>
                                @if($status == '0' && $order->created_by == Auth::user()->id)
                                    <a data-id="{{$order->id}}" href="javascript://" data-url="{{url('order/submit')}}" class="btn btn-norm individual-submit">Submit</a>
                                @endif
                                @if($status == '1')
                                    <!-- <a data-id="{{$order->id}}" href="javascript://" data-url="{{url('order/accept')}}" class="btn btn-danger individual-submit">Accept</a> -->
                                @endif
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
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
        // $('.table').fixedHeader({
        //     topOffset: 0

        // });
        $('#dataTables-example').DataTable({
            responsive: false
        });

    });
</script>
@endpush

@push('style')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link href="{{asset('table-fixed-header.css')}}" rel="stylesheet">
<style>
.nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover{
    background-color: #264595;
}
.nav-pills{
    background-color:rgba(255,255,255,0.3);
}
</style>
@endpush