<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Mandi Details</h4>
        </div>
        <div class="modal-body">
      <form name="myform" id="myform" method="post" action="{{url('mandi')}}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                              @php
                                $final_value =  array();
                              foreach($mandis as $mandi) {
                                $_state = isset($mandi->location->State) ? $mandi->location->State :'';
                                $_city = isset($mandi->location->Town_City) ?$mandi->location->Town_City:'';
                                $_dist = isset($mandi->location->District)?$mandi->location->District:'';
                                $_list = [$_state,$_city,$_dist];
                                $_list = array_filter($_list);
                                $_final_list =  !empty($_list) ? implode(' | ',$_list):'';
                                array_push( $final_value , $_final_list);
                                }
                                @endphp 
        <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Mandi Name</label>
            <div class="col-sm-9">
              <input type="text" name="mandi_name" id="mandi_name" placeholder="Mandi Name" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Agmark Id</label>
            <div class="col-sm-9">
              <select id="agmark_market_id" name="agmark_market" class="form-control">
              <option selected disabled>Select Agmark</option>
              @php 
                $agmark  = App\Model\AgmarkMaster::where('active',1)->pluck('market_name','id');
              @endphp
              @foreach($agmark as $key=>$value)
                <option value="{{$key}}">{{$value}}</option>
            @endforeach
            </select>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Location</label>
            <div class="col-sm-9">
              <select id="location_id" name="location" class="form-control">
              <option selected disabled>Select Location</option>
              @php $states = App\Model\Location::where('is_active',1)->get(); @endphp
              @foreach($states as $value)
                <option value="{{$value->id}}">{{$value->State}}|{{$value->District}}|{{ $value->Town_City}}</option>
              @endforeach
              </select>
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
          <!--   <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">City</label>
            <div class="col-sm-9">
                           <select id="city" name="city" class="form-control">
              <option selected disabled>Select City</option>
              @php $states = App\Model\Location::pluck('Town_City','id'); @endphp
              @foreach($states as $key=>$value)
              <option value="{{$value}}">{{$value}}</option>
              @endforeach
              </select>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">District</label>
            <div class="col-sm-9">
             
              <select id="district" name="district" class="form-control">
              <option selected disabled>Select District</option>
              @php $district = App\Model\Location::pluck('district','id'); @endphp
              @foreach($district as $key=>$value)
              <option value="{{$value}}">{{$value}}</option>
              @endforeach
              </select>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">State</label>
            <div class="col-sm-9">
              
              <select id="state" name="state" class="form-control">
              <option selected disabled>Select State</option>
              @php $states = App\Model\Location::pluck('state','id'); @endphp
              @foreach($states as $key=>$value)
              <option value="{{$value}}">{{$value}}</option>
              @endforeach
              </select>
            </div><br><br> -->
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Delivery Location ID</label>
            <div class="col-sm-9">
             <!--  <input type="text" name="user_id" id="user_id" placeholder="User ID" class="form-control">-->
             <select id="user_id" name="destination_id" class="form-control">
              <option selected disabled>Select Delivery Location</option>
              @php $destinations = App\Model\Destination::pluck('short_name','id'); @endphp
              @foreach($destinations as $key=>$value)
              <option value="{{$key}}">{{$value}}</option>
              @endforeach
              </select>
            </div>
          </div><br>
        </form>
        </div>
        <div class="modal-footer">
        <input type='button' class="btn btn-success" id="updmandi" value="Insert Details" data-url="{{url('getinsert')}}" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>