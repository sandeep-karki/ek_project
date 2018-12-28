<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">{{ translate('Confirm Delete') }}</h4>
            </div>

            <div class="modal-body">
                <strong>{{ translate('Are you sure you want to delete?') }}</strong>

                <p class="debug-url"></p>
            </div>

            <div class="modal-footer">
                {!!Form::open(['method'=>'DELETE','url'=>'', 'class'=>'btn-ok'])!!}
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i class="glyph-icon icon-close"></i> {{ translate('Cancel') }}</button>
                <button type="submit" class="btn btn-sm btn-danger"><i class="glyph-icon icon-trash"></i> {{ translate('Delete') }}</button>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
<!-- confirm modal -->

{{--<div class="modal" id="confirm">--}}
    {{--<div class="modal-dialog">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
                {{--<h4 class="modal-title">Delete Confirmation</h4>--}}
            {{--</div>--}}
            {{--<div class="modal-body">--}}
                {{--<p>Are you sure you, want to delete?</p>--}}
            {{--</div>--}}
            {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn btn-sm btn-primary" id="delete-btn">Delete</button>--}}
                {{--<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<script>
    $('#confirm-delete').on('show.bs.modal', function (e) {
       $(this).find('.btn-ok').attr('action', $(e.relatedTarget).data('href'));
    });
</script>