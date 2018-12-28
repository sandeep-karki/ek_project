<div class="form-group">
    <label class="col-sm-2 control-label">{{ translate('Caption') }}</label>
    <div class="col-sm-10">
        <textarea name="caption_{{$flag->id}}" id="caption" class="form-control" rows="3" >{{Input::old('caption_'.$flag->id)}}</textarea>
    </div>
</div>


