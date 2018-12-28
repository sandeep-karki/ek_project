@php
        $title = isset($title)?$title:null;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <link href="{{ asset('backend/image-resources/favicon.png') }}" rel="shortcut icon">

    <title> @yield('title') | EK CMS</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('backend/css/custom.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('backend/css/custom-media.css')}}" rel="stylesheet" media="screen">

    <!-- FlagIcons -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/icons/flag-icon-css/flag-icon.min.css')}}">
    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/icons/fontawesome/fontawesome.css')}}">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>


<body>
<div id="sb-site">
                <div class>
                    <style>
                        html{
                            height: 100%;
                        }
                        body{
                            height:100%;
                            display: table;
                            width: 100%;
                        }

                        #sb-site{
                            display: table-cell;
                            vertical-align: middle;
                        }
                        .center-vertical {
                            position: relative;
                            z-index: 15;
                            top: 0;
                            left: 0;
                            display: table;
                            width: 100%;
                            height: 100%;
                            text-align: center;
                        }

                        .center-vertical .center-content {
                            display: table-cell;
                            vertical-align: middle;
                        }

                    </style>
                    @yield('content')
                </div>

            </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
