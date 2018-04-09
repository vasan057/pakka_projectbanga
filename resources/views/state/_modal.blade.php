<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">State Details</h4>
        </div>
        <div class="modal-body">
      <form name="myform" id="myform" method="post" action="{{url('state')}}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        
        <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">State Name</label>
            <div class="col-sm-9">
              <input type="text" name="state_name" id="state_name" placeholder="State Name" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Sort Order</label>
            <div class="col-sm-9">
              <input type="text" name="sort_order" id="sort_order" placeholder="Sort Order" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Short Name</label>
            <div class="col-sm-9">
              <input type="text" name="sort_name" id="short_name" placeholder="Short Name" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Status</label>
            <div class="col-sm-9">
              <!--<input type="text" name="active" id="active" placeholder="Active" class="form-control">-->
              <select id="status" name="status" class="form-control">
                    <option value=''>--clear--</option>
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
              </select>
            </div>
          </div><br>
        </form>
        </div>
        <div class="modal-footer">
        <input type='button' class="btn btn-success" id="updstate" value="Insert Details" data-url="{{url('postIndex')}}" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>