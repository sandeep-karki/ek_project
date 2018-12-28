@extends('layouts.system')
@section('title',translate($pageTitle))
@section('content')
    <ol class="breadcrumb">
        <li><a href="{{URL::to(PREFIX.'/home')}}">{{translate('Home')}}</a></li>
        <li class="active">{{translate($pageTitle)}}</li>
    </ol>
    <div id="page-title">
        <h2 style="display:inline-block">{{translate($pageTitle)}}</h2>
    </div>

@include('errors.errors')
    <div class="content-display clearfix">
        <div class="panel panel-default">
            <div class="panel-heading no-bdr">
                <div class="row">
                    <div class="col-sm-8">
                        {!!Form::open(['method'=>'GET','url'=>PREFIX.'/log', 'class'=>'form-inline'])!!}
                        <div class="form-group">
                            <input type="text" class="form-control"  name="keywords" value="{{\Illuminate\Support\Facades\Request::get('keywords')}}" autocomplete="off">
                        </div>

                        <button type="submit" class="btn btn-default">{{('Search')}}</button>
                        {!!Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="panel">
  <div class="panel-box">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" data-toggle="dataTable" data-form="deleteForm">
          <thead class="cf">
            <tr>
                <th>S.N.</th>
                <th>{{translate('User')}}</th>
                <th>{{translate('Module')}}</th>
                <th>{{translate('Log Message')}}</th>
                @if($permissions['deletePermission'])
                <th>{{translate('Action')}}</th>
                    @endif
            </tr>
          </thead>
          <tbody>
          @if($data->isEmpty())
              <tr>

                  <td class="no-data" colspan="5">
                      <b>{{translate('No data to display!')}}</b>
                  </td>
              </tr>
          @else
          @php  $a=$data->perPage() * ($data->currentPage()-1); @endphp
            @foreach($data as $d)
                @php $a++ @endphp
            <tr>
                <td>{{ $a }}</td>
                <td>{{$d->getUserById($d->user_id)}}</td>
                <td>{{$d->module}}</td>
                <td>{{$d->data}}</td>
                @if($permissions['deletePermission'])
                <td>
                    {!! Form::model($d, ['method' => 'delete', 'route' => ['log.destroy', $d->id], 'class' =>'form-inline form-delete']) !!}
                    {!! Form::hidden('id', $d->id) !!}
                    <button type="submit" name="delete_modal" class="btn btn-sm btn-danger" ><i class="glyphicon glyphicon-trash"></i> {{translate('Delete')}} </button>
                    {!! Form::close() !!}


                </td>
                    @endif
            </tr>
            @endforeach
              @endif
          </tbody>
        </table>
      </div>
    </div>
      @if(!$data->isEmpty())
          <div class="pagination-tile"> <label class="pagination-sub" style="display: block;">{{translate('Showing')}} {{($data->currentpage()-1)*$data->perpage()+1}} {{translate('to')}} {{(($data->currentpage()-1)*$data->perpage())+$data->count()}} {{translate('of')}} {{$data->total()}} {{translate('entries')}}</label>
              <ul class="pagination">
                  {!! str_replace('/?', '?',$data->appends(['keywords'=>Input::get('keywords')])->render()) !!}

              </ul>
          </div>
      @endif
      <div class="clearfix"></div>

</div>
</div>

@stop

@section('scripts')


@stop
