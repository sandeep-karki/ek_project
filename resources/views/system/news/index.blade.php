@extends('layouts.system')
@section('title',translate($pagetitle))

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
  {{ session('status') }}
</div>
<br>
@endif
<div id="page-title">
  <h2 style="display:inline-block">{{$pagetitle}}</h2>
  <div class="right" style="float:right">
    <a class="btn btn-success pull-right" href="{{URL::to(PREFIX.'/news/create')}}"><i class="glyph-icon icon-plus"></i>{{('Add New')}}</a>
  </div>
</div>
<div class="breadcrumb-section clearfix">
  <ol class="breadcrumb">
    <li><a href="{{URL::to(PREFIX.'/home')}}">Home</a></li>
    <li class="active">{{$pagetitle}}</li>
  </ol>
</div>


@include('errors.errors')
<div class="panel">
  <div class="panel-body">

  {{--   <div class="upper-form-section clearfix">
      <div class="upper-search pull-right" style="margin-top:10px; margin-bottom:20px;">
        {!!Form::open(['method'=>'GET','url'=>PREFIX.'/news_list', 'class'=>'form-inline', 'id'=>'searchform'])!!}
        <div class="form-group">
          <input type="text" class="form-control" name="keywords" value="{{Input::get('keywords')}}" placeholder="Type here">
        </div>
        <button type="submit" class="btn btn-primary">Go!</button>
        {!!Form::close() !!}
      </div>
    </div> --}}

    <div class="example-box-wrapper">
      <table class="table table-bordered" data-form="deleteForm">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>status</th>
            <th>Category</th>
            <th>Date</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        
        
{{--       <div class="text-left">
        {!! str_replace('/?', '?',$news_data->appends(['keywords'=>Input::get('keywords')])->render()) !!}
      </div> --}}

      <tbody>
       {{-- @php  $a=$news_data->perPage() * ($news_data->currentPage()-1);@endphp --}}
       @if($data->isNotEmpty())
       @foreach($data as $news)
       {{-- @php $a++; @endphp --}}
       <tr> 
        {{-- <td>{{$a}}</td> --}}
        <td>{{ $news->title }}</td>
        <td>{{$news->description}}</td>
        <td>{{$news->status}}</td>
        <td> {{ $news->category}}</a></td>
        <td> {{ $news->date}}</a></td>
        <td> <img src="{{ asset('/uploads/appsetting/' . $news->image) }}" style="width:100px; height:50px;" /> </td>
        <td>
         <a class="btn  btn-sm btn-info"  href="{{ route('news.edit', $news->id) }}"><i class="glyphicon glyphicon-edit"></i> {{('Edit')}}</a>
         {!! Form::model($news, ['method' => 'DELETE', 'route' => ['news.destroy',$news->id] , 'class' =>'form-inline form-delete']) !!}
         <button type="submit" data-toggle="modal" data-target="#confirm-delete" data-id="{{$news->id}}" class="btn btn-sm btn-danger confirm-delete"><i class="glyphicon glyphicon-trash"></i> {{translate('Delete')}} </button>
         {!! Form::close() !!}
       </td>
     </tr>
     @endforeach
     @else
     <td class="no-data" colspan="4">
       <b>{{translate('No data to display!')}}</b>
     </td>
     @endif


   </tbody> 
 </table>

</div>

</div>
</div>

@stop

@section('scripts')
<script>

</script>

@stop
