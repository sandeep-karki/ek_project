@extends('layouts.system')

@section('title', 'Laravel Log')

@section('content')
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <div id="page-title">
        <h2 style="display:inline-block">Laravel Log</h2>
        <div class="right" style="float:right">
        </div>
    </div>

    <div class="breadcrumb-section clearfix">
        <ol class="breadcrumb">
            <li><a href="{{URL::to(PREFIX.'/home')}}">Home</a></li>
            <li class="active"><a href="#" >Laravel Log</a></li>
        </ol>
    </div>

    @include('errors.errors')

    <div class="panel">
        <div class="panel-body">
            {!!Form::open(['method'=>'GET','url'=>PREFIX.'/log', 'class'=>'form-horizontal'])!!}
            <div class="form-group">

                <div class="col-sm-3"></div>
                <div class="col-md-4"></div>
                <label class="col-sm-2 control-label">Search</label>
                @foreach($files as $file)
                    <a href="?l={{ base64_encode($file) }}" class="list-group-item @if ($current_file == $file) llv-active @endif">
                        {{$file}}
                    </a>
                @endforeach
                <div class="col-md-3">
                    <div class="input-group">

                        {{--<input type="text" class="form-control" name="keywords" value="{{Input::get('keywords')}}">--}}
                        <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Go!</button>
                </span>

                    </div>
                </div>
            </div>
            {!!Form::close() !!}
            <div class="example-box-wrapper">
                <div class="scroll-columns">
                    @if ($logs === null)
                        <div>
                            Log file >50M, please download it.
                        </div>
                    @else
                        <div class="table-responsive">
                        <table id="table-log" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Level</th>
                                <th>Context</th>
                                <th>Date</th>
                                <th>Content</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($logs as $key => $log)
                                <tr>
                                    <td class="text-{{$log['level_class']}}}"><span class="glyphicon glyphicon-{{$log['level_img']}}-sign" aria-hidden="true"></span> &nbsp;{{$log['level']}}</td>
                                    <td class="text">{{$log['context']}}</td>
                                    <td class="date">{{$log['date']}}}</td>
                                    <td class="text">
                                        @if ($log['stack']) <a class="pull-right expand btn btn-default btn-xs" data-display="stack{{$key}}"><span class="glyphicon glyphicon-search"></span></a>@endif
                                        {{$log['text']}}
                                        @if (isset($log['in_file'])) <br />{{$log['in_file']}}}@endif
                                        @if ($log['stack']) >@endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        </div>
                    @endif
                </div>
            </div>
            @if($current_file)
                <a href="?dl={{ base64_encode($current_file) }}"><span class="glyphicon glyphicon-download-alt"></span> Download file</a>
                -
                <a id="delete-log" href="?del={{ base64_encode($current_file) }}"><span class="glyphicon glyphicon-trash"></span> Delete file</a>
                @if(count($files) > 1)
                    -
                    <a id="delete-all-log" href="?delall=true"><span class="glyphicon glyphicon-trash"></span> Delete all files</a>
                @endif
            @endif
        </div>
    </div>

@stop

@section('scripts')

    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table-log').DataTable();
        } );
    </script>
@stop
