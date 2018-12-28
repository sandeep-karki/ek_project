@extends('layouts.app')

@section('content')
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

        .input-custom:focus{
            border-color: #66afe9;
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
        }

        .login-text{
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
        }




    </style>
    <img src="{{asset('images/blurred-bg-3.jpg')}}" class="login-img wow fadeIn" alt="">
    @if (count($errors) > 0)
        <div class="col-md-3 center-margin text-center " style="margin-bottom: 10px; border-radius: 5px; padding-top: 10px; padding-bottom: 10px;">
            @if($errors->first('throttle'))
                {{$errors->first('throttle')}}
            @else
                @include("errors.errors")
            @endif

        </div>
    @endif
    <div class="logo-section">
     <div class="logo-content-big"></div>
</div>


    <div class="logo-section">
        <div class="logo-content-big"></div>
    </div>




    <div class="col-md-3 center-margin">
        <form class="form-signin" role="form" method="POST" action="{{ url('/resetpassword/updatepassword') }}">
            {{ csrf_field() }}

            <div id="login-form" class="content-box bg-default">
                <div class="content-box-wrapper pad20A logo-section">
                    Reset Password For Username: {!! @$username !!}
                    <div class="form-group">
                        <div class="input-group input-custom">
                           <span class="input-group-addon bg-blue">
                            <i class="glyph-icon icon-unlock-alt"></i>
                        </span>
                            {!! Form::hidden('userid',$userid,['class'=>'form-control']) !!}
                            {!! Form::hidden('token',$token,['class'=>'form-control']) !!}
                            {!! Form::hidden('email',$email,['class'=>'form-control']) !!}
                            {!! Form::password('password',['class'=>'form-control','placeholder'=>'Password']) !!}

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-custom">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-unlock-alt"></i>
                            </span>
                            {!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Confirm Password']) !!}
                        </div>
                    </div>
                    <div class="form-group login-btn">
                        <button class="btn btn-success btn-block">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>





@endsection
