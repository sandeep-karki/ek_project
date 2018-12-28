//Delete row with post
$('table[data-form="deleteForm"]').on('click', '.form-delete', function(e){
    e.preventDefault();
    var $form=$(this);
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .on('click', '#delete-btn', function(){
            $form.submit();
        });
});


$(document).ready(function(){
    //Sidebar URL active
    $('.toggle-button').on('click', function () {
        $('.page-wrapper').toggleClass('toggle-page');
    });

    var path = window.location.pathname.split('/');
    lastSegment = path[path.length-1];
    if(lastSegment=='create'){
        path = path[path.length-2];
    }else if(lastSegment=='edit') {
        path = path[path.length-3];
    }else {
        path = lastSegment;
    }
    if (path !== undefined) {
        $(".nav-sidebar").find("a[href$='"+path+"']").closest('li').addClass('active');
        $(".nav-sidebar").find("a[href$='" + path + "']").parents().eq(2).addClass('active');
        $(".nav-sidebar").find("a[href$='" + path + "']").closest('.collapse').collapse();
    }

    //DataTable
    $('#example').DataTable();

    //Add Toggle
    $("#addNew").click(function(){
        $("#addNewpanel").slideToggle("slow");
    });

    //Edit Toggle
    $('.edit').click(function() {
        var id = this.id;
        $('#edit_'+id).slideToggle("slow");
    });

    /* Datatables hide columns */

    // $(document).ready(function() {
    //     var table = $('#datatable-hide-columns').DataTable( {
    //         "scrollY": "300px",
    //         "paging": false
    //     } );
    //
    //     $('#datatable-hide-columns_filter').hide();
    //
    //     $('a.toggle-vis').on( 'click', function (e) {
    //         e.preventDefault();
    //
    //         // Get the column API object
    //         var column = table.column( $(this).attr('data-column') );
    //
    //         // Toggle the visibility
    //         column.visible( ! column.visible() );
    //     } );
    // } );
    //
    // /* Datatable row highlight */
    //
    // $(document).ready(function() {
    //     var table = $('#datatable-row-highlight').DataTable();
    //
    //     $('#datatable-row-highlight tbody').on( 'click', 'tr', function () {
    //         $(this).toggleClass('tr-selected');
    //     } );
    // });
    //
    //
    //
    // $(document).ready(function() {
    //     $('.dataTables_filter input').attr("placeholder", "Search...");
    // });
});
