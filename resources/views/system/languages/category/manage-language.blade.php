<div class="panel panel-default" id="pop_lang_{{$pData->id}}" style="display: none;">
      <div class="panel-body">

        {!! Form::open(array('url' => PREFIX.'/langcategory/'.$pData->id.'/manageLanguage', 'method'=>'POST', 'class'=>'form-horizontal bordered-row')) !!}

          <input type="hidden" name="id" value="{{$pData->id}}">
          <div class="form-group" style="border-top: 0px;">
              <label class="col-sm-2 control-label">Languages *:</label>
              <div class="col-sm-10">
                @foreach($languages as $lang)
                <?php
                      $details = $pData->language()->get()->toArray();
                      $selectedLang = array_pluck($details, 'id');
                      if(in_array($lang->id, $selectedLang)) $status = 'checked'; else $status = '';
                      ?>
                <div class="col-sm-2">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="lang[]" value="{{$lang->id}}" {{$status}}> {{$lang->name}}<br>
                    </label>
                </div>
                @endforeach
              </div>
          </div>

          <div class="form-group">
              <div class="col-lg-offset-2 col-lg-6">
                  <button class="btn btn-primary" type="submit"><i class="glyph-icon icon-check" @if(count($languages) == 0) disabled @endif></i> {{ translate('Update') }}</button>
                  <a href="{{URL::to(PREFIX.'/langcategory')}}" class="btn btn-default"><i class="glyph-icon icon-close"></i> {{ translate('Cancel') }}</a>
              </div>
          </div>
              
        {!! Form::close()!!} 
         
        <div class="clearfix"></div>  

      </div>
    </div>

