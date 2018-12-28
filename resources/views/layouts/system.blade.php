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
<style>
    .ul-sidebar > li.active {
        box-shadow: inset 4px 0 0 {{ Session::get('color')}};
    }
    .ul-sidebar li.active > a {
        color: {{ Session::get('color')}};
    }


</style>
<header class="header-navbar" style="background-color: {{ !empty(Session::get('color'))?Session::get('color'):'#292961'}}">
    <div class="container-fluid">
        <div class="header-content clearfix">
            <div class="header-left clearfix pull-left">
                <h1 class="pull-left logo-tag"><a href="{{URL::to(PREFIX.'/')}}"><img src="@if(empty(Session::get('cmslogo'))){{asset('backend/images/logo.png')}}@else{{asset('uploads/settings/'.Session::get('cmslogo'))}}@endif" alt="Ekbana" height="20"><span>{{Session::get('cmstitle')}}</span></a></h1>
            </div>
            <div class="header-right clearfix pull-right">
                <ul class="nav nav-pills">
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="language-img flag-icon flag-icon-{{$data['langCategories']->defaultLang->short_code}}" style="width: 32px; display:  inline-block; height: 15px;"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            @foreach ($data['langCategories']->language as $lang)
                            <li>
                                <a href="{{URL::to(PREFIX.'/langcategory/default/'.$lang->id)}}"><i class="language-img flag-icon flag-icon-{{$lang->short_code}}" style="width: 32px; display:  inline-block; height: 15px;"></i>{{$lang->name}}</a>
                            </li>
                                @endforeach
                        </ul>
                    </li>
                    <li role="presentation" class="dropdown header-user">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            @if(!empty(Auth::user()->image))
                                <img class="header-avatar js-lazy-loaded" src="{{URL::asset('/uploads/users/'.Auth::user()->image)}}" alt="Profile image" width="23" height="23">
                            @else
                                <img class="header-avatar js-lazy-loaded" src="{{URL::asset('backend/image-resources/no-image.jpg')}}" alt="Profile image" width="23" height="23">
                            @endif
                            <i class="fa fa-angle-down custom-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="li-user">
                                <h2>{{ Auth::user()->first_name .' '. Auth::user()->last_name}}</h2>
                                <p>@ {{ Auth::user()->username}} </p>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                @if(Auth::guard('web')->user()->canDo('user.user.profile'))
                                    <a href="{{URL::to(PREFIX.'/profile')}}" title="Edit profile">{{translate('Profile')}}</a>
                                @endif
                            </li>

                            <li><a href="{{URL::to('/system/logout')}}" >
                                    {{translate('Logout')}}
                                </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>


<div class="page-wrapper">

    @include('system.sidebar')

    <div class="custom-container-fluid">
        @yield('content')
    </div>
</div><!-- page-wrapper -->

<!-- Delete modal for post -->
<div class="modal" id="confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Confirm Delete</h4>
            </div>
            <div class="modal-body">
                <strong>Are you sure, you want to delete?</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i class="glyph-icon icon-close"></i> Cancel</button>
                <button type="button" class="btn btn-sm btn-danger" id="delete-btn"><i class="glyph-icon icon-trash"></i> Delete</button>

            </div>
        </div>
    </div>
</div>





<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!-- js and css for datatable -->
<script type="text/javascript" src="{{asset('datatable/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('datatable/dataTables.bootstrap.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('datatable/dataTables.bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('slugify/jquery.slugify.js')}}"></script>

<!-- CK Editor -->
<script type="text/javascript" src="{{asset('vendor/laravel-ckeditor/ckeditor.js')}}"></script>
@include('system.shared.text-editor')

<!-- Custom Scripts -->
<script src="{{asset('backend/js/custom.js')}}"></script>
<!-- Internal Page Scripts -->
@yield('scripts')

</body>
</html>
