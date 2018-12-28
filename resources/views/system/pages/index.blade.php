@extends('layouts.system')

@section('title', $pageTitle)

@section('content')
<div class="breadcrumb-section clearfix">
    <ol class="breadcrumb">
        <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
        <li class="active">{{translate($pageTitle)}}</li>
    </ol>
</div>
<div id="page-title">
    <h2 style="display:inline-block">{{translate($pageTitle)}}</h2>
    <div class="right" style="float:right">
        @if($permissions['createPermission'])

        <a class="btn btn-primary" href="{{URL::to(PREFIX.'/page/create')}}"><i class="glyph-icon icon-plus"
            style="margin-right:10px;"></i>{{ translate('Add New') }}
        </a>
        @endif
    </div>
</div>

@include('errors.errors')

<div class="panel">
    <div class="panel-box">
        <div class="example-box-wrapper">
            <div class="scroll-columns">
                <table class="table table-bordered table-striped table-condensed cf">
                    <thead class="cf">
                        <tr>
                            <th>{{ translate('S.N.') }}</th>
                            <th>{{ translate('Title') }}</th>
                            <th>{{ translate('Slug') }}</th>
                            <th>{{ translate('Position') }}</th>
                            <th>Gallery</th>
                            <th>{{ translate('Status') }}</th>
                            @if($permissions['deletePermission'] ||$permissions['editPermission'])
                            <th>{{ translate('Action') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php  $a=$data->perPage() * ($data->currentPage()-1);@endphp
                        @foreach($data as $d)
                        @php $a++; @endphp
                        <tr>
                            <td>{{$a}}</td>
                            <td>{{ucfirst($d->getPageTitle($d->id))}}</td>


                            <td>{{$d->slug}}</td>
                            <td>{{$d->position}}</td>

                            @if($d->gallery_id!=0)
                            @php  $title1=$d->getpageGalleryContent($d->gallery_id, $a);
                            @endphp
                            <td>
                                <a href="{{URL::to(PREFIX.'/gallery/pages/photo?gallery_id='.$d->gallery_id)}}">{{$title1['title']}}</a>
                            </td>
                            @else
                            <td>No Gallery Added</td>
                            @endif
                            <td>
                                @if($d->status=='active')
                                <a class="btn btn-sm btn-success btn_glyph"
                                href="{{URL::to(PREFIX.'/page/status/'.$d->id)}}">{{ translate('Active') }}</a>
                                @else
                                <a class="btn btn-sm btn-danger btn_glyph"
                                href="{{URL::to(PREFIX.'/page/status/'.$d->id)}}">{{ translate('Inactive') }}</a>

                                @endif
                            </td>
                            @if($permissions['deletePermission'] || $permissions['editPermission'])
                            <td>
                                @if($permissions['editPermission'])

                                {{-- <a class="btn btn-sm btn-info btn_glyph" href="{{URL::to(PREFIX.'/page/edit?id='.$d->id)}}"><i class="glyphicon glyphicon-edit"></i> {{translate('Edit')}}</a> --}}

                                <a class="btn btn-sm btn-sm btn-info btn_glyph"
                                href=" {{URL::to(PREFIX.'/page/'.$d->id.'/edit')}}"><i
                                class="glyphicon glyphicon-edit"></i> Edit</a>
                                @endif
                                @if($permissions['deletePermission'])

                                @if((($d->parent_id!=null)) || ($d->children->count()==0))


                                <a href="javascript:void(0)" data-toggle="modal"
                                data-target="#confirm-delete"
                                data-href="{{URL::to(PREFIX.'/page/destroy?id='.$d->id)}}"
                                class="btn btn-sm btn-danger confirm-delete"><i
                                class="glyph-icon icon-trash"></i> Delete</a>

                                {{-- <a class="btn btn-sm btn-sm btn-danger" href="{{URL::to(PREFIX.'/page/destroy?id='.$d->id)}}" data-confirm="{{ translate('Are you sure you want to delete?')}}"><i class="glyphicon glyphicon-trash "></i>{{ translate('Delete') }}</a> --}}
                                @endif
                                @endif
                            </td>
                            @endif
                            @if(!$d->children->isEmpty())
                            @include('system.pages.child',['d'=>$d,'count'=>'1'])
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-left">
                    {{$data->links()}}
                </div>
            </div>
        </div>


    </div>
</div>

@stop
@section('scripts')
@include('system.shared.confirm-delete')
@stop
