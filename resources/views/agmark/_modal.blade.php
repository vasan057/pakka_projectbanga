
        <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Role Details</h4>
        </div>
        <div class="modal-body">
            <form name="myform" id="myform" method="post" action="{{url('view-agmarks')}}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        
        <div class="form-group">
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Location ID</label>
            <div class="col-sm-9">
          @php  $locations = App\Model\Location::where('is_active',1)->get(); @endphp
              <select name="location_id" id="location_id" class="form-control">
                <option value="">Select Location</option>
                @foreach($locations as $location)
                <option value="{{$location->id}}">{{$location->State .' | '. $location->District .' | '. $location->Town_City}}</option>
                @endforeach
              </select>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Market Name</label>
            <div class="col-sm-9">
            <input type="text" id="market_name" name="market_name" class="form-control"/>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Active</label>
            <div class="col-sm-9">
                <select name="active" id="activesss" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
                </select>
            </div>
          </div><br>
        </form>
        </div>
        <div class="modal-footer">
        <input type='button' class="btn btn-success" id="updrole" value="Insert Details" data-url="{{url('postIndex')}}" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>