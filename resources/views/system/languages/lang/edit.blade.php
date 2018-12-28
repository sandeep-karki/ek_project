 <div class="panel panel-default" id="edit_{{$pData->id}}" style="display:none;">
      <div class="panel-body">

        {!! Form::open(array('url' => PREFIX.'/languages/'.$pData->id, 'method'=>'PUT', 'class'=>'form-horizontal bordered-row', 'files'=>true, 'enctype'=>'multipart/form-data')) !!}

          <input type="hidden" name="id" value="{{$pData->id}}">

          <div class="form-group">
              <label class="col-sm-3 control-label require">Name </label>
              <div class="col-sm-8">
                  {{ Form::text('name', $pData->name, array('id' => 'title', 'class' => 'form-control', 'placeholder' => 'Name')) }}
                  @if($errors->any())
                      <label class="error" for="name">{{$errors->first('name')}}</label>
                  @endif
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-3 control-label require">Short Code </label>
              <div class="col-sm-8">
                  {{--{{ Form::text('short_code', $pData->short_code, array('class' => 'form-control', 'placeholder' => 'Short Code')) }}--}}
                  <select name="short_code" class="form-control" id="short-code-flag">
                      @foreach($countries as $country_name => $country_code)
                          <option value="{{strtolower($country_code)}}"  @if($pData->short_code == strtolower($country_code)) selected @endif @if(Input::old('short_code') == strtolower($country_code)) selected @endif>{{strtolower($country_code)}}</option>
                      @endforeach
                  </select>
                  @if($errors->any())
                      <label class="error" for="short_code">{{$errors->first('short_code')}}</label>
                  @endif
              </div>
          </div>

          <div class="form-group">
              <div class="col-lg-offset-3 col-lg-6">
                  <button class="btn btn-primary" type="submit"><i class="glyph-icon icon-check"></i> {{ translate('Update') }}</button>
                  <a href="{{URL::to(PREFIX.'/languages')}}" class="btn btn-default"><i class="glyph-icon icon-close"></i> {{ translate('Cancel') }}</a>
              </div>
          </div>
              
        {!! Form::close()!!} 
         
        <div class="clearfix"></div>  

      </div>
    </div>



