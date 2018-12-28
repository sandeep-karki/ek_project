    <div class="panel panel-default" id="edit_{{$pData->id}}" style="display:none;">
      <div class="panel-body">

        {!! Form::open(array('url' => PREFIX.'/words/'.$pData->id, 'method'=>'PUT', 'class'=>'form-horizontal bordered-row')) !!}

          <input type="hidden" name="id" value="{{$pData->id}}">
          <div class="form-group" style="border-top: 0px;">
              <label class="col-sm-2 control-label">Word *:</label>
              <div class="col-sm-10">
                  {{ Form::text('word', $pData->word, array('class' => 'form-control', 'placeholder' => 'Word')) }}
                  @if($errors->any())
                      <label class="error" for="word">{{$errors->first('word')}}</label>
                  @endif
              </div>
          </div>

          <div class="form-group">
              <div class="col-lg-offset-2 col-lg-6">
                  <button class="btn btn-primary" type="submit"><i class="glyph-icon icon-check"></i> {{ translate('Update') }}</button>
                  <a href="{{URL::to(PREFIX.'/words')}}" class="btn btn-default"><i class="glyph-icon icon-close"></i> {{ translate('Cancel') }}</a>
              </div>
          </div>
              
        {!! Form::close()!!} 

      </div>
    </div>
