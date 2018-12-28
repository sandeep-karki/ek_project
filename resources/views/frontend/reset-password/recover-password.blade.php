@extends('layouts.app')
<style type="text/css">
    .logo-section img{
        width: 80px;
        margin-bottom: 20px;
    }

    .input-custom span{
    background: transparent;
    border: none;
    }

    .input-custom  input{
        border: none;
        box-shadow: none;
        background: transparent;
        
    }

    .input-custom  input:focus{
        border-color: transparent;
        outline: 0;
     -webkit-box-shadow: none; 
     box-shadow:none; 
    }

    .input-custom {
        border: 1px solid #ddd;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        border-radius: 3px;
    }




</style>

@section('content')
<div class="login-wrapper">
    <div class="login-inner-wrapper">
        <div class="login-sec">
            <h1 style="color: {{$data['color']}};">Forgot Password</h1>
            @if (count($errors) > 0)
            <div class="center-margin text-center " style="margin-bottom: 10px; border-radius: 5px; padding-top: 10px; padding-bottom: 10px;">
                @if($errors->first('throttle'))
                    {{$errors->first('throttle')}}
                @else
                    @include("errors.errors")
                @endif
            </div>
        @endif
            <div class="login-form">
                <form action="{{ url('/forgotpassword/recover') }}"id="login-validation" class="center-margin" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group login-group">
                        <div class="input-group">
                            {!! Form::email('email','',['class'=>'form-control','placeholder'=>'Email']) !!}
                            <div class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="btn-section" style="width: 45%; display: inline-block;">
                            <button type="submit" class="btn btn-block btn-primary">Reset</button>
                        </div>
                        <div class="btn-section" style="width: 45%; display: inline-block; float: right;">
                            <a href="{{ url('system/login') }}" type="submit" class="btn btn-block btn-danger">Cancel</a>
                        </div>
                    </div>
                    
                </form>
            </div><!-- ends login-form -->
        </div><!-- ends login-sec -->
    </div>
</div><!-- login-wrapper -->


@endsection
