@extends('layouts.system')

@section('title', $pageTitle)

@section('content')

    <div id="page-title">
        <h2 style="display:inline-block">{{translate($pageTitle)}}</h2>
        <div class="right" style="float:right">
            @if($permissions['createPermission'])
                <a class="btn btn-primary"
                   href="@if(!empty($gallery)){{URL::to(PREFIX.'/photo/create?gallery_id='.$gallery->id)}}@else{{URL::to(PREFIX.'/photo/create')}}@endif"><i
                            class="glyph-icon icon-plus" style="margin-right:10px;"></i>{{ translate('Add New') }} </a>
            @endif
        </div>
    </div>

    <div class="breadcrumb-section clearfix">
        @php
        if(!empty($gallery)){
            $gallery=$gallery->getGalleryLangContent($gallery->id); } @endphp
        <ol class="breadcrumb">
            <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
            <li><a href="{{URL::to(PREFIX.'/gallery')}}">{{ translate('Gallery') }}</a></li>
            @if(!empty($gallery))
            <li class="active"> {{translate($pageTitle)}} {{translate('of')}}  {{$gallery->title}}</li>
                @endif
        </ol>
    </div>

    @include('errors.errors')

    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <div class="scroll-columns">
                    <table class="table table-bordered table-striped table-condensed cf">
                        <thead class="cf">
                        <tr>
                            <th>{{ translate('S.N.') }}</th>
                            <th>{{ translate('Image') }}</th>
                            <th>{{ translate('Gallery') }}</th>
                            <th>{{ translate('Position') }}</th>
                            <th>{{ translate('Status') }}</th>
                            @if($permissions['deletePermission'] || $permissions['editPermission'])
                                <th>{{ translate('Action') }}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @if($data->isNotEmpty())
                            @php $a=1; @endphp
                            @foreach($data as $d)

                                <tr>
                                    <td>{{$a++}}</td>
                                    <td>
                                        @if(!empty($d->image) && file_exists('uploads/photos/'.$d->image))
                                            <img src="{{URL::asset('uploads/photos/'.$d->image)}}"
                                                 style="height:100px;width:auto;">
                                        @else
                                            No Content Found
                                        @endif
                                    </td>
                                    <td>{{$d->getGalleryphotoContent($d->gallery_id,$a)->title}}</td>
                                    <td>{{$d->position}}</td>
                                    <td>
                                        @if($d->status=='active')
                                            <a class="btn btn-sm btn-success btn_glyph"
                                               href="{{URL::to(PREFIX.'/gallery/pages/photo/status?id='.$d->id)}}">{{ translate('Active') }}</a>
                                        @else
                                            <a class="btn btn-sm btn-danger btn_glyph"
                                               href="{{URL::to(PREFIX.'/gallery/pages/photo/status?id='.$d->id)}}">{{ translate('Inactive') }}</a>
                                        @endif
                                    </td>

                                    <td>
                                        @if($permissions['editPermission'])
                                            <a class="btn btn-sm btn-sm btn-info btn_glyph"
                                               href="{{URL::to(PREFIX.'/gallery/pages/photo/edit?id='.$d->id.'&gallery_id='.$d->gallery_id)}}"><i
                                                        class="glyphicon glyphicon-edit"></i> {{ translate('Edit') }}
                                            </a>
                                        @endif
                                        @if($permissions['deletePermission'])
                                            <a href="javascript:void(0)" data-toggle="modal"
                                               data-target="#confirm-delete"
                                               data-href="{{URL::to(PREFIX.'/gallery/pages/photo/destroy?id='.$d->id.'&gallery_id='.$d->gallery_id)}}"
                                               class="btn btn-sm btn-danger confirm-delete"><i
                                                        class="glyph-icon icon-trash"></i> Delete</a>
                                        @endif
                                        {{--   <a class="btn btn-sm btn-sm btn-danger" href="{{URL::to(PREFIX.'/gallery/pages/photo/destroy?id='.$d->id.'&gallery_id='.$d->gallery_id)}}" data-confirm="{{ translate('Are you sure you want to delete this?') }}"><i class="glyphicon glyphicon-trash"></i>{{ translate('Delete') }}</a> --}}

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div class="text-left">
                    @if(!empty($gallery))
                        {{$data->appends(['gallery_id' => $gallery->id])->render()}}
                        @endif
                    </div>
                </div>
            </div>


        </div>
    </div>

@stop

@section('scripts')

    {{-- <link rel="stylesheet" type="text/css" href="{{URL::asset('backend/widgets/input-switch/inputswitch.css')}}">

    <script type="text/javascript" src="{{URL::asset('backend/widgets/input-switch/inputswitch.js')}}"></script>
    <script type="text/javascript">
     /* Input switch */

     $(function() { "use strict";
       $('.input-switch').bootstrapSwitch();
     });
    </script> --}}

@stop
