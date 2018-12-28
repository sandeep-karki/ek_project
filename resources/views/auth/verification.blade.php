<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <link href="{{ asset('backend/image-resources/favicon.png') }}" rel="shortcut icon">

    <title>Login</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('backend/css/custom.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('backend/css/custom-media.css')}}" rel="stylesheet" media="screen">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body style="background-color: rgba(41, 41, 97, 0.09);">

<style>
    html,body {height: 100%;}
</style>

<div class="login-wrapper">
    <div class="login-inner-wrapper">
        <div class="login-sec">
            <h1 style="color: {{$data['color']}};">Verification Code</h1>
            @if (count($errors) > 0)
                <div @if($errors->first('throttle')) class="col-md-12 center-margin text-center alert-danger alert" style="margin-bottom: 10px; border-radius: 5px; padding-top: 10px; padding-bottom: 10px;" @endif>
                    @if($errors->first('throttle'))
                        {{$errors->first('throttle')}}
                    @else
                        @include("errors.errors")
                    @endif
                </div>
            @endif
            <div class="login-form">
                {!!Form::open(['method'=>'POST','url'=>PREFIX.'/verification', 'class'=>'form-horizontal bordered-row'])!!}
                <input type="hidden" name="token" value="{{$token}}">
                    <div class="form-group">
                        <p style="text-align: center;">Please enter the code you received on your mail.</p>
                    </div>
                    <div class="form-group login-group">
                        <div class="input-group">
                            {!! Form::text('verification_code','',['class'=>'form-control','placeholder'=>'Enter Verification Code','autofocus' => 'autofocus']) !!}
                            <div class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn login-btn btn-block" style="background-color: {{$data['color']}};">Verify</button>
                    </div>

                {!!Form::close() !!}
            </div><!-- ends login-form -->
        </div><!-- ends login-sec -->
    </div>
</div><!-- login-wrapper -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    function hex2rgb(hex, opacity) {
        var h=hex.replace('#', '');
        h =  h.match(new RegExp('(.{'+h.length/3+'})', 'g'));

        for(var i=0; i<h.length; i++)
            h[i] = parseInt(h[i].length==1? h[i]+h[i]:h[i], 16);

        if (typeof opacity != 'undefined')  h.push(opacity);

        return 'rgba('+h.join(',')+')';
    }
    $(function() {
        $("body").css("background-color", hex2rgb("{{$data['color']}}", 0.09));
    })
</script>
</body>
</html>
