<div class="panel panel-default" id="addNewpanel" style="display: none;">
    <div class="panel-body">

        {!! Form::open(array('url' => PREFIX.'/words', 'method'=>'POST', 'class'=>'form-horizontal bordered-row')) !!}


          <div class="form-group" >
              <label class="col-sm-3 control-label">Word :</label>
              <div class="col-sm-9">
                <input type="text" name="words[]" class="form-control" placeholder="Word">
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-3 control-label">Word :</label>
              <div class="col-sm-9">
                <input type="text" name="words[]" class="form-control" placeholder="Word">
              </div>
          </div>

          <div id="moreForm" class="bordered-row"></div>

          <br>
          <div class="form-group">
              <div class="col-lg-offset-3 col-lg-6">
                  <button class="btn btn-primary" type="submit"><i class="glyph-icon icon-check"></i> {{ translate('Save') }}</button>
                  <button id="addForm" class="btn btn-default bootstrap-touchspin-up" type="button">+ Add More Word</button>
                  <a href="{{URL::to(PREFIX.'/words')}}" class="btn btn-default"><i class="glyph-icon icon-close"></i> {{ translate('Cancel') }}</a>
              </div>
          </div>
              
        {!! Form::close()!!} 
         
        <div class="clearfix"></div>  

      </div>
    </div>

