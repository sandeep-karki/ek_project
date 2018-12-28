@extends('layouts.system')

@section('title', 'Edit Language')

@section('content')

<div id="page-title">
        <h2 style="display:inline-block">{{ translate('Edit Language') }}</h2>
        <div class="clearfix"></div>
</div>

<div class="breadcrumb-section clearfix">
  <ol class="breadcrumb">
    <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
    <li><a href="{{URL::to(PREFIX.'/languages')}}" >{{ translate('Language') }}</a></li>
    <li class="active">{{ translate('Edit') }}</li>
  </ol>
</div>

 <div class="row">
    <div class="panel">
      <div class="panel-body">

        {!! Form::open(array('url' => PREFIX.'/languages/'.$pageData->id, 'method'=>'PUT', 'class'=>'form-horizontal bordered-row', 'files'=>true, 'enctype'=>'multipart/form-data')) !!}

          <input type="hidden" name="id" value="{{$pageData->id}}">
            <div class="form-group" style="border-top: 0px;">
            <label class="col-sm-2 control-label">Upload Flag :</label>
            <div class="col-sm-10">
                {{ Form::file('flag', ['id'=>'fileUpload', 'class' => 'form-control']) }}

                 @if(!empty($pageData->flag))
                    <br />
                    <img src="{{URL::asset('/uploads/flag/'.$pageData->flag)}}" height="100">
                    <label>{{$pageData->flag}}</label>
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{ URL::to(PREFIX.'/languages/'.$pageData->id.'/delete-img')}}" class="btn btn-danger btn-xs pull-right"><i class="glyph-icon icon-trash"></i> Remove</a>
                @endif
                <div class="help-block"><i>Note: Image size must be (128 x 128)px approximately.</i></div>
                @if($errors->any())
                      <label class="error" for="flag">{{$errors->first('flag')}}</label>
                  @endif
            </div>
          </div>
          <div class="form-group" id="image-preview" style="display:none">
              <label class="col-sm-2 control-label">Image preview upload</label>
              <div class="col-sm-10">
                  <div id="image-holder"> </div>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-2 control-label">Name *:</label>
              <div class="col-sm-10">
                  {{ Form::text('name', $pageData->name, array('id' => 'title', 'class' => 'form-control', 'placeholder' => 'Name')) }}
                  @if($errors->any())
                      <label class="error" for="name">{{$errors->first('name')}}</label>
                  @endif
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-2 control-label">Short Code *:</label>
              <div class="col-sm-10">
                  {{ Form::text('short_code', $pageData->short_code, array('class' => 'form-control', 'placeholder' => 'Short Code')) }}
                  @if($errors->any())
                      <label class="error" for="short_code">{{$errors->first('short_code')}}</label>
                  @endif
              </div>
          </div>

          <div class="form-group">
              <div class="col-lg-offset-2 col-lg-6">
                  <button class="btn btn-primary" type="submit"><i class="glyph-icon icon-check"></i> {{ translate('Update') }}</button>
                  <a href="{{URL::to(PREFIX.'/languages')}}" class="btn btn-default"><i class="glyph-icon icon-close"></i> {{ translate('Cancel') }}</a>
              </div>
          </div>

        {!! Form::close()!!}

        <div class="clearfix"></div>

      </div>
    </div>
  </div>
 <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">{{ translate('Confirm Delete') }}</h4>
                </div>

                <div class="modal-body">
                  <strong>{{ translate('Are you sure you want to delete?') }}</strong>

                  <p class="debug-url"></p>
                </div>

                <div class="modal-footer">
                  {!!Form::open(['method'=>'DELETE','url'=>PREFIX.'/languages/'.$pageData->id.'/delete-img', 'class'=>'btn-ok'])!!}
                  <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i class="glyph-icon icon-close"></i> {{ translate('Cancel') }}</button>
                  <button type="submit" class="btn btn-sm btn-danger"><i class="glyph-icon icon-trash"></i> {{ translate('Delete') }}</button>
                  {!!Form::close()!!}
                  <!-- <a class="btn btn-danger btn-ok">Delete</a> -->
                </div>
              </div>
            </div>
          </div>
          <script>
$('#confirm-delete').on('show.bs.modal', function (e) {
 $(this).find('.btn-ok').attr('action', $(e.relatedTarget).data('href'));
});
</script>

@stop

@section('scripts')
@include('system.shared.preview-image')

@stop
