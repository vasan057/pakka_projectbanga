@php $states  = App\Model\State::where('status',1)->pluck('state_name') @endphp
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Location Details</h4>
        </div>
        <div class="modal-body">
      <form name="myform" id="myform" method="post" class="form-horizontal">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="textinput">State</label>
                <div class="col-sm-9">
                    <select name="State" id="State" class="form-control">
                        <option value="">Select state</option>
                        @foreach($states as $state)
                        <option value="{{$state}}">{{$state}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="textinput">District</label>
                <div class="col-sm-9">
                    <input type="text" name="District" id="District" placeholder="District" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="textinput">City</label>
                <div class="col-sm-9">
                <input type="text" name="Town_City" id="Town_City" placeholder="City" class="form-control">
                </div>
            </div>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Activity</label>
            <div class="col-sm-9">
                <select name="is_active" id="is_active" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
                </select>
            </div>
          </div>
          </div>
          <input type="hidden" name="edit_id" id="edit_id">
        </form>
        </div>
        <div class="modal-footer">
        <input type='button' class="btn btn-success" id="updrole" value="Insert Details" data-url="{{url('postIndex')}}" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>