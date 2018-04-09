<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">User Role Mapping Details</h4>
        </div>
        <div class="modal-body">
      <form name="myform" id="myform" method="post" action="{{url('role-manager')}}" class="form-horizontal">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        
        <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Select Role</label>
            <div class="col-sm-9">
            @php $roles = App\Model\Role::get(); $views = App\Library\General::getViews();  @endphp
              <select name="role" id="role" class="form-control">
                <option value="">Select Role</option>
                @foreach($roles as $role)
                  <option value="{{$role->id}}">{{$role->role}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
              <label class="col-sm-3 control-label" for="textinput">Device Type</label>
              <div class="col-sm-9">
                <!--<input type="text" name="active" id="active" placeholder="Active" class="form-control">-->
                <select id="select-device" name="device" class="form-control">
                      <option value="M">Mobile</option>
                      <option value="W">Web site</option>
                </select>
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-3 control-label" for="textinput">Select View</label>
              <div class="col-sm-9">
                <!--<input type="text" name="active" id="active" placeholder="Active" class="form-control">-->
                <select id="_view" name="view" class="form-control">
                      <option value=''>Select Menu</option>
                </select>
                <select id="M_view" name="menu" class="form-control" style="display:none">
                      <option value=''>Select Menu</option>
                      @foreach($views['Mobile'] as $key=>$value)
                        <option value="{{$key}}">{{$value}}</option>
                      @endforeach
                </select>
                
                <select id="W_view" name="menu" class="form-control" style="display:none">
                      <option value=''>Select Menu</option>
                      @foreach($views['Website'] as $key=>$value)
                        <option value="{{$key}}">{{$key}}</option>
                        @endforeach
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