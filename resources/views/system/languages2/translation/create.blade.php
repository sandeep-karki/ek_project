@extends('layouts.system')

@section('title', 'Add New Translation')

@section('content')

<div id="page-title">
        <h2 style="display:inline-block">{{ translate('Add New Translation') }}</h2>
        <div class="clearfix"></div>
</div>

<div class="breadcrumb-section clearfix">
  <ol class="breadcrumb">
    <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
    <li><a href="{{URL::to(PREFIX.'/translation')}}" >{{ translate('Translation') }}</a></li>
    <li class="active">{{ translate('Add') }}</li>
  </ol>
</div>

 <div class="row">
    <div class="panel">
      <div class="panel-body" style="padding:60px 60px;">

        {!! Form::open(array('url' => PREFIX.'/translation', 'method'=>'POST', 'class'=>'form-horizontal')) !!}

          <div class="form-group" style="border-top: 0px;">
              <label class="col-sm-2 control-label">Words *</label>
              <div class="col-sm-10">
                {{ Form::select('word_id', $words, null, ['class' => 'form-control']) }}
                @if($errors->any())
                    <label class="error" for="cname">{{$errors->first('word_id')}}</label>
                @endif
              </div>
          </div>

          <div class="form-group" style="border-top: 0px;">
              <label class="col-sm-2 control-label">Language *</label>
              <div class="col-sm-10">
                {{ Form::select('language_id', $languages, null, ['class' => 'form-control']) }}
                @if($errors->any())
                    <label class="error" for="cname">{{$errors->first('language_id')}}</label>
                @endif
              </div>
          </div>
          
          <div class="form-group">
              <label class="col-sm-2 control-label">Translate Word *</label>
              <div class="col-sm-10">
                  {{ Form::text('translate_word', null, array('class' => 'form-control', 'placeholder' => 'Translate Word')) }}
                  @if($errors->any())
                      <label class="error" for="translate_word">{{$errors->first('translate_word')}}</label>
                  @endif
              </div>
          </div>

          <hr>
          <div class="form-group">
              <div class="col-lg-offset-2 col-lg-6">
                  <button class="btn btn-primary" type="submit"><i class="glyph-icon icon-check"></i> Save</button>
                  <a href="{{URL::to(PREFIX.'/translation')}}" class="btn btn-default"><i class="glyph-icon icon-close"></i> Cancel</a>
              </div>
          </div>
              
        {!! Form::close()!!} 
         
        <div class="clearfix"></div>  

      </div>
    </div>
  </div>


@stop

@section('scripts')

<style>
.form-horizontal .control-label{
text-align:left;
}
</style>

@stop
