<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Insert Mandi price Details</h4>
        </div>
        <div class="modal-body">
            <form name="myform" id="myform" method="post" action="{{url('order')}}" class="form-horizontal">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                <div class="col-md-12">
                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Mandi</label>
                    <div class="col-sm-9">
                    @php $mandis = App\Model\UserMandiMapping::with('mandi')->get()->pluck('mandi.short_name','mandi.id'); @endphp
                    <select name="mandi" id="mandi_id" class="form-control" data-arthiya="{{url('mandi/arthiya-by-mandi')}}"  data-url="{{url('mandi/mandi-by-destination')}}">
                        <option value="">Select Mandi</option>
                        @foreach($mandis as $key=>$mandi)
                        <option value="{{$key}}">{{$mandi}}</option>
                        @endforeach
                    </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Pakka Arthiya</label>
                    <div class="col-sm-9">
                    <select name="pakka_arthiya" id="pakka_arthiya_id" class="form-control">
                        <option value="">Select Pakka Arthiya</option>
                        
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="reference">Reference</label>
                        <div class="col-sm-9">
                            <input type="text" name="reference" id="reference" placeholder="Reference Number" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="textinput">Quantity</label>
                        <div class="col-sm-9">
                            <input type="text" name="quantity" id="quantity" placeholder="Quantity" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="price">Offer Price</label>
                    <div class="col-sm-9">
                        <input type="text" name="price" id="price" placeholder="Price" class="form-control">
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="baseprice">Base Price</label>
                    <div class="col-sm-9">
                        <input type="text" name="baseprice" id="baseprice" placeholder="baseprice" class="form-control" disabled>
                    </div>
                    </div>
                    <div class="form-group" id="counter-price" style="display:none">
                    <label class="col-sm-3 control-label" for="counter_price">Counter price</label>
                    <div class="col-sm-9">
                        <input type="text" name="counter_price" id="counter_price" placeholder="Counter price" class="form-control">
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="delicery_location">Delivery Location</label>
                    <div class="col-sm-9">
                        <select name="delivery_location" id="delivery_location" class="form-control">
                        <option value="">Select Location</option>
                        </select>
                    </div>
                    </div>
            </form>
        </div>
    <div class="clearfix"></div>
    <div class="modal-footer">
    <input type='submit' class="btn btn-success" id="updlocation" value="Insert Details" />
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
    </div>
    
</div>
</div>