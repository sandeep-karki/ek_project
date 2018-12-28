
<div class="panel panel-default" id="pop_default_{{$pData->id}}" style="display: none;">
      <div class="panel-body">

        {!! Form::open(array('url' => PREFIX.'/langcategory/'.$pData->id.'/defaultLanguage', 'method'=>'POST', 'class'=>'form-horizontal bordered-row')) !!}

          <input type="hidden" name="id" value="{{$pData->id}}">
          <div class="form-group" style="border-top: 0px;">
              <label class="col-sm-2 control-label">Languages *:</label>
              <div class="col-sm-10">
                @foreach($pData->language as $lang)
                <?php
                      if($lang->id == $pData->default_lang) $status = 'checked'; else $status = '';
                      ?>
                <div class="col-sm-2">
                    <div class="radio">
                        <label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="defaultlang" value="{{$lang->id}}" {{$status}}> {{$lang->name}}<br>
                                </label>
                            </div>
                        </label>
                    </div>

                </div>
                @endforeach
              </div>
          </div>

          <div class="form-group">
              <div class="col-lg-offset-2 col-lg-6">
                  <button class="btn btn-primary" type="submit" @if(count($languages) == 0) disabled @endif><i class="glyph-icon icon-check"></i> {{ translate('Update') }}</button>
                  <a href="{{URL::to(PREFIX.'/langcategory')}}" class="btn btn-default"><i class="glyph-icon icon-close"></i> {{ translate('Cancel') }}</a>
              </div>
          </div>
              
        {!! Form::close()!!} 
         
        <div class="clearfix"></div>  

      </div>
    </div>

