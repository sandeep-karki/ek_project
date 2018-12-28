

@extends('layouts.app')

@section('content')
    <style>
        html{
            height: 100%;
        }
        body{
            background: url('../../image-resources/blurred-bg/blurred-bg-3.jpg') !important;
            height:100%;
            display: table;
            width: 100%;
        }

        #sb-site{
            display: table-cell;
            vertical-align: middle;
        }


    </style>

    <div class="center-vertical">
        <div class="center-content row">

            <div class="col-md-6 center-margin" >
                <div class="server-message wow bounceInDown inverse">
                    <h1>Error 405</h1>
                    <p>Method is not allowed.</p>

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

