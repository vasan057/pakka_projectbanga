<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Competitor Details</h4>
        </div>
        <div class="modal-body">
      <form name="myform" id="myform" method="post" action="{{url('competitor')}}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        
        <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Buyer Name</label>
            <div class="col-sm-9">
              <input type="text" name="buyer_name" id="buyer_name" placeholder="Buyer Name" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Other Details</label>
            <div class="col-sm-9">
              <input type="text" name="other_detail" id="other_detail" placeholder="Other Details" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Short Code</label>
            <div class="col-sm-9">
              <input type="text" name="short_code" id="short_code" placeholder="Short Code" class="form-control">
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Sort Order</label>
            <div class="col-sm-9">
              <input type="text" name="short_order" id="short_order" placeholder="Sort Order" class="form-control">
            </div><br>
        </form>
        </div>
        <div class="modal-footer">
        <input type='button' class="btn btn-success" id="updcompetitor" value="Insert Details" data-url="{{url('postIndex')}}" />
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>