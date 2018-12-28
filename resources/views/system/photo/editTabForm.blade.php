<input class="form-control" name="page_lang_contents_id_{{$flag->id}}" type="hidden"  value="{{$pageLangData->id}}"> 
<div class="form-group">
	<label class="col-sm-2 control-label">{{ translate('Caption') }}</label>
	<div class="col-sm-10">
		<textarea name="caption_{{$flag->id}}" id="caption" class="form-control" rows="3" >{{$pageLangData->caption}}</textarea>
	</div>
</div>


