<script type="text/javascript">

  function toggleStatus(togurl,id)
  {

    $.ajax
    ({
      url: togurl+"?id="+id,
      type: 'get',
      success: function(result)
      {

        if (result == 'Publish') {
          $('#status_btn'+id).removeClass('btn btn-warning btn-xs').addClass('btn btn-primary btn-xs');
          $('#status_btn'+id).html('<i class="glyph-icon icon-refresh"></i> &nbsp;'+result);
        }else{
          $('#status_btn'+id).removeClass('btn btn-primary btn-xs').addClass('btn btn-warning btn-xs');
          $('#status_btn'+id).html('<i class="glyph-icon icon-refresh"></i> &nbsp;'+result);
        };
        // $('#status_txt'+id).attr('class', 'status_'+result);

      },
      error: function()
      {
        $('#modalinfo div').html(' <div class="modal-content"><div class="modal-header"><h2>Could not complete the request.</h2></div></div>');
        $('#modalinfo').modal('show');
      }
    });
  }

  function toggleStatus2(togurl,id)
  {
    $.ajax
    ({
      url: togurl+"?id="+id,
      type: 'get',
      success: function(result)
      {
        if (result == 'Publish') {
          $('#status_btn'+id).removeClass('btn btn-warning btn-xs').addClass('btn btn-primary btn-xs');
          $('#status_btn'+id).html('<i class="glyph-icon icon-refresh"></i> &nbsp;'+result);
        }else{
          $('#status_btn'+id).removeClass('btn btn-primary btn-xs').addClass('btn btn-warning btn-xs');
          $('#status_btn'+id).html('<i class="glyph-icon icon-refresh"></i> &nbsp;'+result);
        };
        $('#status_txt'+id).attr('class', 'status_'+result);
      },
      error: function()
      {
        $('#modalinfo div').html(' <div class="modal-content"><div class="modal-header"><h2>Could not complete the request.</h2></div></div>');
        $('#modalinfo').modal('show');
      }
    });
  }

</script>