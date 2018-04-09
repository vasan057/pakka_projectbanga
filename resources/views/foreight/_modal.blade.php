<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">For Freight Details</h4>
        </div>
        <div class="modal-body">
       <form name="myform" id="myform" method="post" action="{{url('for-freight-get')}}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        
        <div class="form-group">
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Mandi Name</label>
            <div class="col-sm-9">
          @php  $mandis = App\Model\Mandi::get(); @endphp
              <select name="mandi_id" id="mandi_id" class="form-control">
                <option value="">Select Mandi</option>
                @foreach($mandis as $mandi)
                <option value="{{$mandi->id}}">{{$mandi->short_name}}</option>
                @endforeach
              </select>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Delivery Loc.</label>
            <div class="col-sm-9">
          @php  $destinations = App\Model\Destination::get(); @endphp
              <select name="destination_id" id="destination_id" class="form-control">
                <option value="">Select Destination</option>
                @foreach($destinations as $destination)
                <option value="{{$destination->id}}">{{$destination->short_name}}</option>
                @endforeach
              </select>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Group ID</label>
            <div class="col-sm-9">
            @php  $forlineitems = App\Model\ForLineItem::distinct('group')->get(['group']); @endphp
              <select name="gid" id="gid" class="form-control">
                <option value="">Select Group ID</option>
                @foreach($forlineitems as $forlineitem)
                <option value="{{$forlineitem->group}}">{{$forlineitem->group}}</option>
                @endforeach
              </select>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Freight Value</label>
            <div class="col-sm-9">
            <input type="text" id="freight_value" name="freight_value" class="form-control"/>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Valid From</label>
            <div class="col-sm-9">
            <input type="text" id="valid_from" name="valid_from" class="form-control" readonly/>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Valid TO</label>
            <div class="col-sm-9">
            <input type="text" id="valid_to" name="valid_to" class="form-control" readonly/>
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