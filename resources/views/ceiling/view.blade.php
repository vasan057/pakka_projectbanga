@extends('layouts.main')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12"><br><br>
                <div class="panel panel-default">
                    <div class="panel-body" style="color:#9A1031"><Strong>Ceilings Details</Strong></div>
                </div>
                    <div class='col-md-12'>
                    <!--<button style="float: right;" class="btn btn-danger" id='modal' data-toggle="modal" data-target="#myModal1">Add Record</button>   -->
                    
                    <a style="margin-left:  10px;margin-right: 10px;float: right;" href="{{url('ceiling/notify-all')}}" id='notify_all' class="btn btn-warning @if(!$ceilings->sum('isFrozen')) disabled @endif" >Notify All</a> 
                    
                    <a style="margin-left:  10px;margin-right: 10px;float: right;" href="{{url('ceiling/un-freeze')}}" id='unfreeze_all' class="btn btn-danger @if(!$ceilings->sum('isFrozen')) disabled @endif" >UnFreeze All</a>
                    <a style="margin-left:  10px;margin-right: 10px;float: right;" href="{{url('ceiling/freeze')}}" id='freeze_all' class="btn btn-success " @if($ceilings->sum('isFrozen')) disabled @endif>Freeze All</a>
                        
                    <button style="margin-left:  10px;margin-right: 10px;float: right;" data-toggle="modal" data-target="#myModal_setall" id='set_all' class="btn btn-primary " @if(!$ceilings->sum('isFrozen')) disabled @endif>Set All</button> 
               </div>
               <br><br>  </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" id="events-table-wrapper">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           
                            <table style= "width:100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead class="header">
                                    <tr bgcolor="#9A1031">
                                        <th class="custom_color">Mandi Name</th>
                                        <th class="custom_color">Notified Date & Time</th>
                                        <th class="custom_color">Quantity</th>
                                        <th class="custom_color">Price min</th>
                                        <th class="custom_color">Price Max</th>
                                        <th class="custom_color">Avg Buying</th>
                                        <!-- <th class="custom_color">Avg Agmark</th> -->
                                        <th class="custom_color">Modal Price</th>
                                        <th class="custom_color">Suggested Price</th>
                                        <th class="custom_color">Ceiling Price</th>
                                        <th class="custom_color">Notify</th>
                                        
                                       <!-- <th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($ceilings as $ceiling)
                                @php 
                                $avg =0;
                                $modal = 0;
                                $suggest =$ceiling->quantity;

                                $mandi = $ceiling->mandi;
                                $agmark = false;
                                $agmark_net = false;
                                $min = $ceiling->agmarketnet(10000)->where('date_arrival',date('Y-m-d'))->min('ag_min');
                                if($mandi) $agmark = $mandi->agmark;
                                if($agmark){
                                            $agmark_net = $agmark->agmarknet();
                                            $_data = $agmark_net->orderBy('date_arrival','desc')->limit(7)->get();
                                           $mandi_orders = $mandi->orders()->where('order_price','>',0)
                                                                        ->where('status',2)
                                                                        ->orderBy('order_date','desc')->limit(7)->get();
                                            $arr = array();
                                            $modal_arr = array();
                                            $total_min_buying = 0;
                                            foreach($mandi_orders as $mandi_order){
                                                $arr[] = $mandi_order->order_price;
                                            }      
                                            foreach($_data as $modal_avg){
                                                $modal_arr[] = $modal_avg->modal;
                                            }                     
                                            if(count($arr)) $total_min_buying = array_sum($arr) / count($arr);
                                            if(count($modal_arr)) $modal = array_sum($modal_arr) / count($modal_arr);

                                            $avg = round($total_min_buying,2,2);
                                            $modal = round($modal,2,2);
                                        } 
                                      if($avg){
                                           $suggest = min($min,$avg,$modal)>0?min($min,$avg,$modal):$ceiling->min;
                                      }else{
                                        $suggest = min($min,$modal)>0?min($min,$modal):$ceiling->min;
                                      }
                                    @endphp
                                    <tr class="odd gradeX">                                     
                                        <td>{{ $ceiling->mandi->short_name or '' }}</td>
                                        <td>{{ $ceiling->ceiling->notified_time or '' }}</td>
                                        <td>{{ $ceiling->quantity }}</td>
                                        <td>{{ $ceiling->min }}</td>
                                        <td>{{ $ceiling->max }}</td>
                                        <td>{{$avg}}</td>
                                        <!-- <td>{{ $sss or '-' }}</td> -->
                                        <td>{{  $modal }}</td>
                                        <td>{{  $suggest }}</td> 
                                        <td>
                                                <input type="text" name="ceiling"  class="col-md-8 {{$ceiling->id}}_cls" value="{{$ceiling->ceiling->ceiling_price or $suggest}}">
                                                <button class="btn btn-danger btn-sm set-price" data-url="{{url('ceiling/set-price')}}" id="{{$ceiling->id}}" @if(!$ceilings->sum('isFrozen')) disabled @endif>Set</button>
                                        </td> 
                                        <td>
                                        <button class="btn btn-danger btn-sm set-notify" data-url="{{url('ceiling/set-notify')}}" data-id="{{$ceiling->id}}" @if(!$ceilings->sum('isFrozen')) disabled @endif>Notify</button>
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
@include('ceiling._modal')
@endpush

@push('script')
<script src="{{asset('js/ceiling/view.js')}}"></script>
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