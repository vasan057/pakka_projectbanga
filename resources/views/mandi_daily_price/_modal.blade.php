<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Mandi price Details</h4>
        </div>
        <div class="modal-body">
      <form name="myform" id="myform" method="post" action="{{url('mandi-daily-price')}}" class="form-horizontal">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        <div class="col-md-12">
            <div class="form-group">
              <label class="col-sm-3 control-label" for="textinput">Mandi</label>
              <div class="col-sm-9">
              @php $user_id = Auth::user()->id; $mandis = App\Model\UserMandiMapping::where(['user_id'=>$user_id,'active'=>1])->with('mandi')->get(); @endphp
              <select name="mandi" id="mandi_id" class="form-control">
               <option value="">Select Mandi</option>
               @foreach($mandis as $mandi)
               <option value="{{$mandi->mandi->id}}">{{$mandi->mandi->short_name}}</option>
               @endforeach
              </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="textinput">Minimum price</label>
              <div class="col-sm-9">
                <input type="text" name="min_price" id="min_price" placeholder="Minimum price" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="textinput">Maximum price</label>
              <div class="col-sm-9">
                <input type="text" name="max_price" id="max_price" placeholder="Maximum price" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label" for="textinput">Quantity</label>
              <div class="col-sm-9">
                <input type="text" name="quantity" id="quantity" placeholder="Quantity" class="form-control">
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

  <!-- Notification Modal !>
  <!-- Modal -->
<div class="modal fade" id="myNotifModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Error</h4>
        </div>
        <div class="modal-body">
        </div>
        <div class="clearfix"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>