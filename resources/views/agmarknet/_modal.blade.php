<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agmark Details</h4>
        </div>
        <div class="modal-body">
      <form name="myform" id="myform" method="post" action="{{url('agmarknet-upload')}}" class="form-horizontal">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        <div class="col-md-12">
            <div class="form-group">
              <label class="col-sm-3 control-label" for="textinput">Mandi</label>
              <div class="col-sm-9">
               @php $mandis = App\Model\Mandi::pluck('short_name','id'); @endphp
               <select name="mandi_id" id="mandi_id" class="form-control">
                <option value="">Select Mandi</option>
                @foreach($mandis as $key=>$mandi)
                <option value="{{$key}}">{{$mandi}}</option>
                @endforeach
               </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="textinput">State</label>
              <div class="col-sm-9">
               @php $states = App\Model\State::where('status',1)->pluck('short_name','id'); @endphp
               <select name="state_name" id="state_name" class="form-control">
                <option value="">Select State</option>
                @foreach($states as $key=>$state)
                <option value="{{$key}}">{{$state}}</option>
                @endforeach
               </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="textinput">District</label>
              <div class="col-sm-9">
               @php $locations = App\Model\Location::where('is_active',1)->pluck('District','id'); @endphp
               <select name="district_name" id="district_name" class="form-control">
                <option value="">Select district</option>
                @foreach($locations as $key=>$location)
                <option value="{{$key}}">{{$location}}</option>
                @endforeach
               </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="textinput">Market Center Name</label>
              <div class="col-sm-9">
                <input type="text" name="market_center_name" id="market_center_name" placeholder="Market Center Name" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="textinput">Commodity</label>
              <div class="col-sm-9">
                <input type="text" name="commodity" id="commodity" placeholder="Commodity" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="textinput">Variety</label>
              <div class="col-sm-9">
                <input type="text" name="variety" id="variety" placeholder="Variety" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="textinput">Grade</label>
              <div class="col-sm-9">
                <input type="text" name="grade" id="grade" placeholder="Grade" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="textinput">Minimum</label>
              <div class="col-sm-9">
                <input type="text" name="ag_min" id="ag_min" placeholder="Minimum" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="textinput">Maximum</label>
              <div class="col-sm-9">
                <input type="text" name="ag_max" id="ag_max" placeholder="Maximum" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="textinput">Modal</label>
              <div class="col-sm-9">
                <input type="text" name="modal" id="modal" placeholder="Modal" class="form-control">
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