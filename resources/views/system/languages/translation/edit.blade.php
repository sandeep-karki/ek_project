@extends('layouts.system')

@section('title', 'Edit Word Translation')

@section('content')

<div id="page-title">
        <h2 style="display:inline-block">{{ translate('Edit Word Translation') }}</h2>
        <div class="clearfix"></div>
</div>

<div class="breadcrumb-section clearfix">
  <ol class="breadcrumb">
    <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
    <li><a href="{{URL::to(PREFIX.'/language/pages/translation')}}" >{{ translate('Word Translation') }}</a></li>
    <li class="active">{{ translate('Edit') }}</li>
  </ol>
</div>

 <div class="row">
    <div class="panel">
      <div class="panel-body" style="padding:60px 60px;">

        {!! Form::open(array('url' => PREFIX.'/language/pages/translation/update', 'method'=>'POST', 'class'=>'form-horizontal')) !!}

          <input type="hidden" name="id" value="{{$pageData->id}}">
         <div class="form-group" style="border-top: 0px;">
              <label class="col-sm-3 control-label">Words *</label>
              <div class="col-sm-6">
                {{ Form::select('word_id', $words, $pageData->word()->first()->id, ['class' => 'form-control']) }}
                @if($errors->any())
                    <label class="error" for="cname">{{$errors->first('word_id')}}</label>
                @endif
              </div>
          </div>

          <div class="form-group" style="border-top: 0px;">
              <label class="col-sm-3 control-label">Language *</label>
              <div class="col-sm-6">
                {{ Form::select('language_id', $languages, $pageData->language()->first()->id, ['class' => 'form-control']) }}
                @if($errors->any())
                    <label class="error" for="cname">{{$errors->first('language_id')}}</label>
                @endif
              </div>
          </div>
          
          <div class="form-group">
              <label class="col-sm-3 control-label">Translate Word *</label>
              <div class="col-sm-6">
                  {{ Form::text('translate_word', $pageData->translate_word, array('class' => 'form-control', 'placeholder' => 'Translate Word')) }}
                  @if($errors->any())
                      <label class="error" for="translate_word">{{$errors->first('translate_word')}}</label>
                  @endif
              </div>
          </div>
          
          <hr>
          <div class="form-group">
              <div class="col-lg-offset-3 col-lg-6">
                  <button class="btn btn-primary" type="submit"><i class="glyph-icon icon-check"></i> Update</button>
                  <a href="{{URL::to(PREFIX.'/language/pages/translation')}}" class="btn btn-default"><i class="glyph-icon icon-close"></i> Cancel</a>
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
