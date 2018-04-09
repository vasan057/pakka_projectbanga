<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delivery Details</h4>
        </div>
        <div class="modal-body">
      <form name="myform" id="myform" method="post" action="{{url('destination')}}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        
        <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Delivery Type</label>
            <div class="col-sm-9">
              <input type="text" name="delivery_type" id="delivery_type" placeholder="Delivery Type" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Delivery Name</label>
            <div class="col-sm-9">
              <input type="text" name="delivery_name" id="delivery_name" placeholder="Delivery Name" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Short Name</label>
            <div class="col-sm-9">
              <input type="text" name="short_name" id="short_name" placeholder="Short Name" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Address 1</label>
            <div class="col-sm-9">
              <input type="text" name="address_1" id="address_1" placeholder="Address 1" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Address 2</label>
            <div class="col-sm-9">
              <input type="text" name="address_2" id="address_2" placeholder="Address 2" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Pincode</label>
            <div class="col-sm-9">
              <input type="text" name="pincode" id="pincode" placeholder="Pincode" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">City</label>
            <div class="col-sm-9">
              <input type="text" name="city" id="city" placeholder="City" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">District</label>
            <div class="col-sm-9">
              <input type="text" name="district" id="district" placeholder="District" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">State</label>
            <div class="col-sm-9">
              <select id="state" name="state" class="form-control">
              <option value=''>--clear--</option>
              @php $states = App\Model\State::pluck('state_name','id'); @endphp
              @foreach($states as $key=>$value)
              <option value="{{$value}}">{{$value}}</option>
              @endforeach
              </select>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Mobile 1</label>
            <div class="col-sm-9">
              <input type="text" name="mobile_1" id="mobile_1" placeholder="Mobile 1" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Mobile 2</label>
            <div class="col-sm-9">
              <input type="text" name="mobile_2" id="mobile_2" placeholder="Mobile 2" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Email 1</label>
            <div class="col-sm-9">
              <input type="text" name="email_1" id="email_1" placeholder="Email 1" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Email 2</label>
            <div class="col-sm-9">
              <input type="text" name="email_2" id="email_2" placeholder="Email 2" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">GSTIN</label>
            <div class="col-sm-9">
              <input type="text" name="gstin" id="gstin" placeholder="GSTIN" class="form-control">
            </div><br>
        </form>
        </div>
        <div class="modal-footer">
        <input type='button' class="btn btn-success" id="upddestination" value="Insert Details" data-url="{{url('postIndex')}}" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>