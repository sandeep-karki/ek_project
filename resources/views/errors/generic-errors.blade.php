@extends('layouts.app')

@section('content')


<div class="center-vertical">
    <div class="center-content row">

        <div class="col-md-6 center-margin">
            <div class="server-message wow bounceInDown inverse">
                <p>OOPS! someting went wrong. Please, Try again .</p>

                <form>
                    <div class="input-group mrg25B mrg10T input-group-lg">
                        <div class="input-group-btn">

                        </div>
                    </div>
                    <a class="btn btn-lg btn-success" href="{{url(PREFIX.'/home')}}">Return To Home Page</a>
                </form>
            </div>
        </div>

    </div>
</div>


@endsection
