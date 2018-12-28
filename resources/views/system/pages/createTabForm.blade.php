

<div class="form-group">
    <label class="col-sm-2 control-label require">{{ translate('Title') }}</label>
    <div class="col-sm-10">
        <input class="form-control" name="title_{{$flag->id}}" type="text"  value="{{Input::old('title_' . $flag->id)}}" id="@if($flag->id==1){{'lblValue'}}@endif"  >

    </div>
</div>

{{-- <div class="form-group">
    <label class="col-sm-2 control-label">{{ translate('Subtitle') }}</label>
    <div class="col-sm-10">
        <input name="short_description_{{$flag->id}}" id="short_description" class="form-control" type="text" value="{{Input::old('short_description_'.$flag->id)}}" >
    </div>
</div> --}}
<div class="form-group">
    <label class="col-sm-2 control-label require">{{ translate('Description') }}</label>
    <div class="col-sm-10">
        <textarea name="description_{{$flag->id}}"   class="form-control texteditor" rows="10" >{{Input::old('description_'.$flag->id)}}</textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label ">{{ translate('Upload Image') }}</label>
    <div class="col-sm-5">
        <input type="file" class="form-control" id="image" name="background_image_{{$flag->id}}" placeholder="" value="{{Input::old('background_image_'.$flag->id)}}">

    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">{{ translate('HTML Title') }}</label>
    <div class="col-sm-10">
        <input class="form-control" name="html_title_{{$flag->id}}" type="text" id="html_title" value="{{Input::old('html_title_'.$flag->id)}}">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">{{ translate('HTML Description') }}</label>
    <div class="col-sm-10">
        <textarea name="html_description_{{$flag->id}}" id="html_description" class="form-control" rows="5">{{Input::old('html_description_'.$flag->id)}}</textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">{{ translate('HTML Keywords') }}</label>
    <div class="col-sm-10">
        <textarea name="html_keywords_{{$flag->id}}" id="html_keywords" class="form-control" rows="5">{{Input::old('html_keywords_'.$flag->id)}}</textarea>
    </div>
</div>