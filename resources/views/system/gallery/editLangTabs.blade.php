<ul class="nav nav-tabs">
  @php $a=0; @endphp
  @foreach($flags as $flag)
  <input type="hidden" name="flags[]" value="{{$flag->id}}">
  @if( ($loop->first && !Session::has('defaultLang')) || ( Session::has('defaultLang') && Session::get('defaultLang') == $flag->id ) )
  <li class="active">
    @else
    <li>
      @endif
      <a data-toggle="tab" href="#{{ucfirst($flag->short_code)}}" id="langtab">
       <i class="language-img flag-icon flag-icon-{{$flag->short_code}}"></i>
       {{--  @if($flag->flag!= '' && file_exists(public_path('uploads/flag/'.$flag->flag)))
        <img src="{{URL::asset('/uploads/flag/'.$flag->flag)}}" height="20" width="20" style="float:left; margin-right:5px;">{{ucfirst($flag->short_code)}}
        @else
        <img height="20" width="20" style="float:left; margin-right:5px;">{{ucfirst($flag->short_code)}}
        @endif --}}
      </a>
    </li>
    <!-- <li><a data-toggle="tab" href="#Nepali">Nepali</a></li> -->
    @endforeach
  </ul>

  <div class="tab-content" style="border:solid 1px #dddddd; border-top:none;">
    @php $b=0; @endphp
    @foreach($flags as $flag)
    @if( ($loop->first && !Session::has('defaultLang')) || ( Session::has('defaultLang') && Session::get('defaultLang') == $flag->id ) )
    <div id="{{ucfirst($flag->short_code)}}" class="tab-pane fade in active">{{Session::forget('defaultLang')}}
      @else
      <div id="{{ucfirst($flag->short_code)}}" class="tab-pane fade">
        @endif
        <div class="panel-body">
          <?php $pageLangData = $data->getDataByLanguage($flag->id, $data->id);?>
          @if(!empty($pageLangData))
          @include('system.gallery.editTabForm',['flag'=>$flag,'pageLangData'=>$pageLangData])
          @else
          @include('system.gallery.createTabForm')
          @endif
        </div>
      </div>
      @endforeach
    </div>