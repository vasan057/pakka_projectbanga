@extends('layouts.main')
@section('content')
<div id="page-wrapper" style="min-height: 208px;height: 865px;">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            <div class="huge">{{$data['arrival']['qty'] or 0 }} ql</div>
                                <div>Available Qty</div>
                                <div>{{$data['arrival']['current_count'] or 0 }} / {{$data['arrival']['all_count'] or 0 }} mandis</div>
                            </div>
                        </div>
                    </div>
                <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left"></span>
                            <span class="pull-right hide"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                        &nbsp;
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            <div class="huge">{{$data['offer']['qty'] or 0 }} ql</div>
                                <div>Pending Offers</div>
                            <div>{{$data['offer']['count']}} offers</div>
                            </div>
                        </div>
                    </div>
                <a href="{{url('offer')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$data['order']['qty'] or 0 }} ql</div>
                                <div>Pending Orders</div>
                                <div>{{$data['order']['count']}} orders</div>
                            </div>
                        </div>
                    </div>
                <a href="{{url('order?status=1')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                @if($data['ceiling']['price'] && $data['ceiling']['price'] >0)
                            <div class="huge">{{$data['ceiling']['price'] or 0 }}</div>
                                <div>Todays Auction price</div>
                                <div>{{$data['ceiling']['current_count'] or 0 }} / {{$data['ceiling']['all_count'] or 0 }} mandis</div>
                            </div>
                            @else
                            <div class="huge">&nbsp;</div>
                            <div>Not yet Notified</div>
                                <div>Todays Auction price</div>
                            </div>
                            @endif
                        </div>
                    </div>
                <a href="{{url('ceiling/view')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-7 col-md-7">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i>Last 7 days purchase

                    </div>
                    <div class="panel-body">
                            <div class="row">
                                <div id="chart_div"></div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i>Purchase

                    </div>
                    <div class="panel-body">
                           <table class="table table-bordered">
                               <thead>
                                    <tr>
                                        <th colspan="2"></th>
                                        <th>Quantity</th>
                                        <th>Average Purchase Price</th>
                                        <th>Average FOR Rate</th>
                                    </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <td rowspan="4" class="text-middle">
                                            Last 7 Days
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>Auction</td>
                                   <td>{{$data['avg_weekly_auction_quantity'] or ''}}</td>
                                       <td>{{$data['avg_auction_purchase'] or ''}}</td>
                                       <td>{{$data['avg_weekly_auction_for_rate'] or ''}}</td>
                                   </tr>
                                   <tr>
                                       <td>Offer</td>
                                       <td>{{$data['avg_weekly_offer_quantity'] or ''}}</td>
                                       <td>{{$data['avg_weekly_offer_purchase'] or ''}}</td>
                                       <td>{{$data['avg_weekly_offer_for_rate'] or ''}}</td>
                                   </tr>
                                   <tr>
                                       <td>Total</td>
                                   <td>{{$data['qty_total'] or '0'}}</td>
                                       <td>{{$data['avg_weekly_purchase_total'] or ''}}</td>
                                       <td>{{$data['avg_weekly_offer_for_total'] or ''}}</td>
                                   </tr>
                                   <tr>
                                       <td rowspan="4"  class="text-middle">
                                            YTD
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>Auction</td>
                                   <td>{{$data['avg_yearly_auction_qty'] or ''}}</td>
                                       <td>{{$data['avg_yearly_auction_purchase'] or ''}}</td>
                                       <td>{{$data['avg_yearly_auction_for'] or ''}}</td>
                                   </tr>
                                   <tr>
                                       <td>Offer</td>
                                       <td>{{$data['avg_yearly_offer_qty'] or ''}}</td>
                                       <td>{{$data['avg_yearly_offer_purchase'] or ''}}</td>
                                       <td>{{$data['avg_yearly_offer_for'] or ''}}</td>
                                   </tr>
                                   <tr>
                                       <td>total</td>
                                       <td>{{$data['avg_yearly_qty_total'] or ''}}</td>
                                       <td>{{$data['avg_yearly_purchase_total'] or ''}}</td>
                                       <td>{{$data['avg_yearly_for_total'] or ''}}</td>
                                   </tr>
                               </tbody>
                           </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.row -->
    </div>
@endsection
@push('script')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
     
     google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('date', 'Time of Day');
        data.addColumn('number', 'Avg Agmark Price');
        data.addColumn('number', 'Avg Purchase Price');
        data.addColumn('number', 'Weekly Avg Purchase Price');
        data.addColumn('number', 'YTD Avg Purchase Price');
        var _data = [{{$data['graph']}}];
        data.addRows(_data);


        var options = {
          width: 650,
          backgroundColor: { fill:'transparent' },
          height: 500,
          legend: { position: 'bottom', alignment: 'start' },
          hAxis: {
            format: 'M/dd/yy',
            gridlines: {count: 6}
          },
          vAxis: {
            gridlines: {color: '#eee'},
            minValue: 0
          }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

        chart.draw(data, options);

        var button = document.getElementById('change');

       
      }
</script>
@endpush