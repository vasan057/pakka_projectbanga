<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Role Details</h4>
        </div>
        <div class="modal-body">
      <form name="myform" id="myform" method="post" action="{{url('for-line-items')}}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        <div class="form-group">
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Parameter</label>
            <div class="col-sm-9">
            <input type="text" id="parameter" name="parameter" class="form-control"/>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Group</label>
            <div class="col-sm-9">
            <input type="text" id="group" name="group" class="form-control"/>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Data Type</label>
            <div class="col-sm-9">
            <select id="data_types" name="data_type" class="form-control">
                <option value="flat">Flat</option>
                <option value="perc">Perc</option>
                <option value="total">Total</option>
            </select>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Sequence</label>
            <div class="col-sm-9">
            <input type="text" id="sequence" name="sequence" onkeypress="return (event.charCode >= 48 && event.charCode <= 57 || event.charCode == 8 || event.charCode == 46)" class="form-control"/>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Base</label>
            <div class="col-sm-9">
            <input type="text" id="base" name="base" class="form-control"/>
            </div><br><br>
            <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Value</label>
            <div class="col-sm-9">
            <input type="text" id="value" name="value" class="form-control"/>
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