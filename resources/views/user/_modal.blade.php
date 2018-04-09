<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">User Details</h4>
        </div>
        <div class="modal-body">
      <form name="myform" id="myform" method="post" action="{{url('user')}}" class="form-horizontal">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        
        <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">User ID</label>
            <div class="col-sm-9">
              <input type="text" name="user_id" id="user_id" placeholder="User ID" class="form-control">
            </div>
            </div>
            <div class="form-group password-field">
            <label class="col-sm-3 control-label" for="textinput">Password</label>
            <div class="col-sm-9">
              <input type="password" name="password" id="password" placeholder="Password" class="form-control">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Mobile 1</label>
            <div class="col-sm-9">
              <input type="text" name="mobile_1" id="mobile_1" placeholder="Mobile 1" class="form-control">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Mobile 2</label>
            <div class="col-sm-9">
              <input type="text" name="mobile_2" id="mobile_2" placeholder="Mobile 2" class="form-control">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Address 1</label>
            <div class="col-sm-9">
              <input type="text" name="address_1" id="address_1" placeholder="Address 1" class="form-control">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Address 2</label>
            <div class="col-sm-9">
              <input type="text" name="address_2" id="address_2" placeholder="Address 2" class="form-control">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Pincode</label>
            <div class="col-sm-9">
              <input type="text" name="pincode" id="pincode" placeholder="Pincode" class="form-control">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">GSTIN</label>
            <div class="col-sm-9">
              <input type="text" name="gstin" id="gstin" placeholder="GSTIN" class="form-control">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Role</label>
            <div class="col-sm-9">
              <select id="roles_id" name="roles_id" class="form-control">
              <option value=''>--clear--</option>
              @php $roles = App\Model\Role::pluck('role','id'); @endphp
              @foreach($roles as $key=>$value)
              <option value="{{$key}}">{{$value}}</option>
              @endforeach
              </select>
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Email 1</label>
            <div class="col-sm-9">
              <input type="text" name="email_1" id="email_1" placeholder="Email 1" class="form-control">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Email 2</label>
            <div class="col-sm-9">
              <input type="text" name="email_2" id="email_2" placeholder="Email 2" class="form-control">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Active</label>
            <div class="col-sm-9">
              <!--<input type="text" name="active" id="active" placeholder="Active" class="form-control">-->
              <select id="active" name="active" class="form-control">
                    <option value=''>--clear--</option>
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
              </select>
            </div>
          </div>
        </form>
        </div>
        <div class="modal-footer">
        <input type='button' class="btn btn-success user_btns" id="upduser" value="Insert Details" data-url="{{url('postIndex')}}" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>