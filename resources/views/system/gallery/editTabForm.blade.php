<input class="form-control" name="page_lang_contents_id_{{$flag->id}}" type="hidden"  value="{{$pageLangData->id}}">

<div class="form-group">
    <label class="col-sm-2 control-label require">{{ translate('Title') }}</label>
    <div class="col-sm-10">
        <input class="form-control" name="title_{{$flag->id}}" type="text"  value="{{$pageLangData->title}}" id="@if($flag->id==1){{'lblValue'}}@endif">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label require">{{ translate('Description') }}</label>
    <div class="col-sm-10">
        <textarea name="description_{{$flag->id}}" id="editor1" class="form-control texteditor" rows="5">{{$pageLangData->description}}</textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">{{ translate('HTML Title') }}</label>
    <div class="col-sm-10">
        <input class="form-control" name="html_title_{{$flag->id}}" type="text" id="html_title" value="{{$pageLangData->html_title}}">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">{{ translate('HTML Description') }}</label>
    <div class="col-sm-10">
        <textarea name="html_description_{{$flag->id}}" id="html_description" class="form-control" rows="5">{{$pageLangData->html_description}}</textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">{{ translate('HTML Keywords') }}</label>
    <div class="col-sm-10">
        <textarea name="html_keywords_{{$flag->id}}" id="html_keywords" class="form-control" rows="5">{{$pageLangData->html_keywords}}</textarea>
    </div>
</div>