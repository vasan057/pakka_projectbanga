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
                            <div class="huge">{{$data['counter']['qty'] or 0 }} ql</div>
                                <div>Open Counter Offers</div>
                                <div>{{$data['counter']['count'] or 0 }} counteroffers</div>
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
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            <div class="huge">{{$data['offer']['qty'] or 0 }} ql</div>
                                <div>Offer Quantity Accepted</div>
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
                                <div>Order Quantity Accepted</div>
                            </div>
                        </div>
                    </div>
                <a href="{{url('order?status=2')}}">
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
        
        <!-- /.row -->
    </div>
@endsection