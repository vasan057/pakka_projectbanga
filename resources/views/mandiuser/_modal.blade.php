<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Mandi - User Mapping</h4>
        </div>
        <div class="modal-body">
      <form name="myform" id="myform" method="post" action="{{url('user-mandi')}}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        
        <div class="form-group">
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">User ID</label>
            <div class="col-sm-9">
          @php  $users = App\Model\UsersBasic::get(); @endphp
              <select name="user_id" id="user_id" class="form-control">
                <option disabled value="">Select User</option>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->user_id}}</option>
                @endforeach
              </select>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Mandi ID</label>
            <div class="col-sm-9">
            @php $mandis = App\Model\Mandi::get(); @endphp
            <select name="mandi_id[]" id="mandi_id" class="form-control" multiple="">
                <option disabled value="">Select Mandi</option>
                @foreach($mandis as $mandi)
                <option value="{{$mandi->id}}">{{$mandi->short_name}}</option>
                @endforeach
              </select>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Active</label>
            <div class="col-sm-9">
                <select name="active" id="active" class="form-control">
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