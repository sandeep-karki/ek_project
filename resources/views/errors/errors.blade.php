
@if($errors->any())

    @if( ($errors->first('alert-success') || $errors->first('alert-danger') || $errors->first('alert-warning')))
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if($errors->has('alert-' . $msg))
                <div class="alert alert-{{ $msg }}" style="width: 100%;">
                    <p style="margin-bottom: 0px;">{{ $errors->first('alert-' . $msg) }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                </div>
            @endif
        @endforeach
    @else
        <div class="alert alert-danger" role="alert" style="width: 100%;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            @foreach($errors->all() as $error)
                <p class="" style="margin-bottom: 0px;"><span class="fa fa-exclamation-triangle" aria-hidden="true"></span>&nbsp;{{$error}}</p>
            @endforeach
        </div>
    @endif

    {{--@if($errors->has('validation_error_messages'))--}}
    {{--{{dump($errors)}}--}}
    {{--@endif--}}

@endif

@if(Session::has('message'))

    <div class="alert {{ Session::get('alert-class') }}" style="width: 100%;">

        <p style="margin-bottom: 0px;">{{Session::get('message') }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    </div>
@endif
