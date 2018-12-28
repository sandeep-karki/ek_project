<div class="form-group">
    {!! Form::label('title','Title:',['class'=>'control-label col-sm-3']) !!}
    <div class='col-sm-6'>
    {!! Form::text('title',null,['class'=>'form-control']) !!}
    @if($errors->has("title"))
    <span class="help-block" style="color:red;">*{{ $errors->first("title") }}</span>
    @endif
     </div>
</div>

<div class="form-group">
    {!! Form::label('code','Code:',['class'=>'control-label col-sm-3']) !!}
    <div class='col-sm-6'>
        {!! Form::text('code',null,['class'=>'form-control']) !!}
        @if($errors->has("code"))
            <span class="help-block" style="color:red;">*{{ $errors->first("code") }}</span>
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('email_subject','Email Subject:',['class'=>'control-label col-sm-3']) !!}
    <div class='col-sm-6'>
    {!! Form::text('email_subject',null,['class'=>'form-control']) !!}
    @if($errors->has("email_subject"))
    <span class="help-block" style="color:red;">*{{ $errors->first("email_subject") }}</span>
    @endif
     </div>
</div>
<div class="form-group">
    {!! Form::label('email_body','Email Body:',['class'=>'control-label col-sm-3']) !!}
    <div class='col-sm-6'>
    {!! Form::textarea('email_body',null,['class'=>'form-control']) !!}
    @if($errors->has("email_body"))
    <span class="help-block" style="color:red;">*{{ $errors->first("email_body") }}</span>
    @endif
     </div>
</div>

<div class="form-group">
    <label class="col-sm-4 control-label">&nbsp;</label>
    <div class="col-sm-6">
      <div class="pull-left">
            <a class="btn btn-warning" href="{{URL::to(PREFIX.'/email')}}"><i class="glyphicon glyphicon-chevron-left" style="margin-right:10px;"></i>Back</a>
            <button class="btn btn-primary"><i class="glyphicon glyphicon-ok" style="margin-right:10px;"></i>{{ $btnTxt }}</button>
        </div>
    </div>
</div>
