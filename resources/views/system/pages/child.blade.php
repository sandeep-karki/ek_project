@foreach($d->children as $child)
<tr>

	<td>&nbsp;</td>
	<td style="text-transform: capitalize;">
		<?php
echo str_repeat('- &nbsp;', $count);
?>
		{{ucfirst($child->getPageTitle($child->id))}}</td>
		{{-- @php
		if($d->menu_type!=null)
		{
			if($d->menu_type=="main_menu")
			{
				$menu="Main Menu";
			}
			if($d->menu_type=="side_menu")
			{
				$menu="Side Menu";
			}
			if($d->menu_type=="footer_menu")
			{
				$menu="Footer Menu";
			}
			if($d->menu_type==null)
			{
				$menu="";
			}
		}
		else
		{
			$menu="";
		}
		@endphp --}}
{{-- 		<td>{{$child->menu_type}}</td>
 --}}		<td>{{$child->slug}}</td>

		<td>{{$child->position}}</td>
		@if($child->gallery_id!=0)
		@php

		$title=$child->getpageGalleryContent($child->gallery_id, $a = 0);
		@endphp
		<td><a href="{{URL::to(PREFIX.'/gallery/pages/photo?gallery_id='.$child->gallery_id)}}">{{$title['title']}}</a></td>
		@else
		<td>No Gallery Added</td>
		@endif
		<td>
			@if($child->status=='active')
			<a class="btn btn-sm btn-success btn_glyph" href="{{URL::to(PREFIX.'/page/status/'.$child->id)}}">Active</a>
			@else
			<a class="btn btn-sm btn-danger btn_glyph" href="{{URL::to(PREFIX.'/page/status/'.$child->id)}}">Inactive</a>

			@endif
		</td>
		<td>
			<a class="btn btn-sm btn-sm btn-info btn_glyph" href="{{URL::to(PREFIX.'/page/edit?id='.$child->id)}}"><i class="glyphicon glyphicon-edit"></i>Edit </a>


<a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to(PREFIX.'/page/destroy?id='.$child->id)}}" class="btn btn-sm btn-danger confirm-delete"><i class="glyph-icon icon-trash"></i> Delete</a>
			{{-- <a class="btn btn-sm btn-sm btn-danger" href="{{URL::to(PREFIX.'/page/destroy?id='.$child->id)}}" data-confirm="Are you sure you want to delete?"><i class="glyphicon glyphicon-trash"></i>Delete</a> --}}

		</td>
	</tr>

	@endforeach