    <div class="panel panel-default" id="addNewpanel" style="display: none;">
            <div class="panel-body">

                {!! Form::open(array('url' => PREFIX.'/languages', 'method'=>'POST', 'class'=>'form-horizontal bordered-row', 'files'=>true, 'enctype'=>'multipart/form-data')) !!}



                <div class="form-group">
                    <label class="col-sm-2 control-label require">Name </label>
                    <div class="col-sm-10">
                        {{ Form::text('name', null, array('id' => 'title', 'class' => 'form-control', 'placeholder' => 'Name')) }}
                        @if($errors->any())
                            <label class="error" for="name">{{$errors->first('name')}}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label require">Short Code </label>
                    <div class="col-sm-10">
                        <select name="short_code" class="form-control" id="short-code-flag">
                            @foreach($countries as $country_name => $country_code)
                                <option value="{{strtolower($country_code)}}" @if(Input::old('short_code') == strtolower($country_code)) selected @endif>{{strtolower($country_code)}}</option>
                            @endforeach
                        </select>

                        @if($errors->any())
                            <label class="error" for="short_code">{{$errors->first('short_code')}}</label>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-6">
                        <button class="btn btn-primary" type="submit"><i class="glyph-icon icon-check"></i> {{ translate('Save') }}</button>
                        <a href="{{URL::to(PREFIX.'/languages')}}" class="btn btn-default"><i class="glyph-icon icon-close"></i> {{ translate('Cancel') }}</a>
                    </div>
                </div>

                {!! Form::close()!!}

            </div>
        </div>

