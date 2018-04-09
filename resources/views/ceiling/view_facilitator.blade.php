@extends('layouts.main')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12"><br><br>
                <div class="panel panel-default">
                    <div class="panel-body" style="color:#264595"><Strong>Ceilings Details</Strong></div>
                </div>
                   
               <br> </div>
                <!-- /.col-lg-12 -->
                <!--<div class="col-md-12 pull-right"> <button class="btn btn-danger" type="button">
                        <span class="badge">{{$min or 0}}</span><small> Minmum of all mandis</small>
                    </button></div>-->
            </div>
            <!-- /.row -->
            <div class="row" id="events-table-wrapper">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           
                            <table style= "width:100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr bgcolor="#264595">
                                        <th class="custom_color">Mandi Name</th>
                                        <th class="custom_color">Notified Date & Time</th>
                                        <th class="custom_color">Quantity</th>
                                        <th class="custom_color">Price min</th>
                                        <th class="custom_color">Price Max</th>
                                        <th class="custom_color">Ceiling Price</th>
                                        
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
                                        <td>{{ $ceiling->ceilingHistory->mandi_name or '' }}</td>
                                        <td>{{ $ceiling->ceilingHistory->created_at or '' }}</td>
                                        <td>{{ $ceiling->ceilingHistory->quantity or '' }}</td>
                                        <td>{{ $ceiling->ceilingHistory->min_price or '' }}</td>
                                        <td>{{ $ceiling->ceilingHistory->max_price or '' }}</td>
                                        <td>{{$ceiling->ceilingHistory->ceiling_price or ''}}</td> 
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
@endpush

@push('style')

@endpush