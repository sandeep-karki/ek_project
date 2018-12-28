@extends('layouts.system')

@section('title', translate($title))

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{URL::to(PREFIX.'/home')}}">{{translate('Home')}}</a></li>
        <li class="active">{{translate($title)}}</li>
    </ol>

    <div id="page-title">
        <h2 style="display:inline-block">{{translate($title)}}</h2>
        <div class="right" style="float:right">
            @if($data['createPermission'])
          <a class="btn btn-primary" href="{{URL::to(PREFIX.'/user/create')}}"><i class="glyph-icon icon-plus" style="margin-right:10px;"></i>{{translate('Add New')}}</a>
                @endif
        </div>
    </div>

    @include('errors.errors')

        <div class="panel">
            <div class="panel-box">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" data-toggle="dataTable" data-form="deleteForm">
                  <thead class="cf">
                    <tr>
                        <th>S.N.</th>
                        <th>{{translate('Name') }}</th>
                        <th>{{translate('Username')}} </th>
                        <th>{{translate('Email')}} </th>
                        <th>{{translate('Role')}} </th>
                        @if($data['destroyPermission']|| $data['editPermission'])
                            <th>{{translate('Action')}}</th>
                        @endif
                    </tr>
                  </thead>
                  <tbody>
                  @if($users->isEmpty())
                  <tr>

                      <td class="no-data" colspan="5">
                          <b>{{translate('No data to display!')}}</b>
                      </td>
                  </tr>
                  @else
                      @php  $a=$users->perPage() * ($users->currentPage()-1); @endphp
                      @foreach($users as $datum)
                          @php $a++;@endphp
                    <tr>
                        <td>{{ $a }}</td>
                        <td>{{$datum->first_name .' '.$datum->last_name}}</td>
                        <td>{{$datum->username}}</td>
                        <td>{{$datum->email}}</td>
                        <td class="capital">{{$datum->rolesUser->role->name}}</td>
                        @if($data['destroyPermission']|| $data['editPermission'])
                        <td>
                            @if($data['editPermission'])
                          <a class="btn btn-sm btn-info btn_glyph" href="{{URL::to(PREFIX.'/user/'.$datum->id.'/edit')}}"><i class="glyphicon glyphicon-edit"></i> {{translate('Edit')}}</a> @endif
                                @if($data['destroyPermission'])
                                    {!! Form::model($datum, ['method' => 'DELETE', 'route' => ['user.destroy',$datum->id] , 'class' =>'form-inline form-delete']) !!}
                                    {!! Form::hidden('id', $datum->id) !!}
                                    <button type="submit" data-toggle="modal" data-target="#confirm-delete" data-id="{{$datum->id}}" class="btn btn-sm btn-danger confirm-delete" ><i class="glyphicon glyphicon-trash"></i> {{translate('Delete')}} </button>
                                    {!! Form::close() !!}
                                @endif
                                @if($data['editPermission'])
                                    <a class="btn btn-sm btn-primary btn_glyph" href="{{URL::to(PREFIX.'/user/password/'.$datum->id)}}"><i class="glyphicon glyphicon-wrench"></i> {{translate('Reset Password')}}</a>
                                 @endif
                        </td>
                            @endif
                    </tr>
                    @endforeach
                      @endif
                  </tbody>
                </table>
              </div>
        </div>

      @if(!$users->isEmpty())
          <div class="pagination-tile"> <label class="pagination-sub">{{translate('Showing') }} {{($users->currentpage()-1)*$users->perpage()+1}} {{translate('to')}} {{(($users->currentpage()-1)*$users->perpage())+$users->count()}} {{translate('of')}} {{$users->total()}} {{translate('entries')}}</label>
              <ul class="pagination" style="float:right ; margin:0px;">
                  {!! str_replace('/?', '?',$users->appends(['keywords'=>Input::get('keywords')])->render()) !!}

              </ul>
          </div>
      @endif

@stop
