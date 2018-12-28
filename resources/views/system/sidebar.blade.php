<div class="nav-sidebar">
    <div class="inner-navbar clearfix">
        <ul class="ul-sidebar" id="accordion">
            @foreach($modulesPermission as $modules)

            <li class="panel">
                    @if($modules['pages']>1)
                        <a href="#sidenav{{$modules['id']}}" title="{{$modules['title']}}" data-toggle="collapse" class="arw collapsed" data-parent="#accordion">
                    @else
                        <a href="{{URL::to(PREFIX."/".$modules['id'])}}">
                    @endif

                            <i class="glyph-icon {{$modules['icon']}}"></i>
                            <span class="span-link">{{ translate($modules['title']) }}</span>
                        </a>
                @if($modules['pages']>1)
                <ul id="sidenav{{$modules['id']}}" class="collapse">
                    {{-- <li><a href="{{URL::to(PREFIX."/".$modules['id'])}}">{{ translate($modules['title']) }}</a></li> --}}
                    <li><a href="#" class="inactiveLink">{{ translate($modules['title']) }}</a></li>
                    @foreach($modules['subPages'] as $pageId=>$pageTitle)
                        <?php $url = PREFIX."/".$pageId;?>
                            <li><a href="{{URL::to($url)}}" class="">{{ translate($pageTitle) }}</a></li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
        <a class="toggle-button" role="button" title="Toggle sidebar" type="button"><span>Collapse Sidebar</span></a>
    </div><!-- ends inner-navbar -->
</div><!-- ends nav-sidebar -->