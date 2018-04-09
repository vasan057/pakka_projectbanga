<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Mandi Destination Details</h4>
        </div>
        <div class="modal-body">
          <form name="myform" id="myform" method="post" class="form-horizontal">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        
        <div class="form-group">           
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Mandi Name</label>
            <div class="col-sm-8">
              <!-- <input type="text" name="mandi_id" id="mandi_id" placeholder="Mandi ID" class="form-control"> -->
              <select id="mandi_id" name="mandi_id" class="form-control">
              <option value=''>--Please Select--</option>
              @foreach($mandi as $value)
              <option value='{{ $value->id }}'>{{$value->short_name}}</option>
              @endforeach
              </select>
            </div></div>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Delivery Location</label>
            <div class="col-sm-8">
              <!-- <input type="text" name="location_id" id="location_id" placeholder="Location ID" class="form-control"> -->
              <select id="destination_id" name="destination_id" class="form-control">
              <option value=''>--Please Select--</option>
               @foreach($destination as $value)
              <option value='{{ $value->id }}'>{{$value->short_name}}</option>
              @endforeach
              </select>
            </div></div>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Active</label>
            <div class="col-sm-8">
              <!-- <input type="text" name="active" id="active" placeholder="Active" class="form-control"> -->
              <select id="active" name="active" class="form-control activess">
              <option value=''>--Please Select--</option>
              <option value='1'>Active</option>
              <option value='0'>Inactive</option>
              </select>
            </div>
          </div>
        </form>
        </div>
        <div class="modal-footer">
        <input type='button' class="btn btn-success" id="updrole" value="Insert Details" data-url="{{url('postIndex')}}" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>