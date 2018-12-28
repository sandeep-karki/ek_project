@extends('layouts.system')

@section('title', 'Templates List View')

@section('content')

    <div id="page-title">
        <h2 style="display:inline-block">Page Tile</h2>
        <div class="right" style="float:right">
            <a class="btn btn-primary" href="#"><i class="glyph-icon icon-plus" style="margin-right:10px;"></i>Add New Button</a>
           
        </div>
    </div>




    <div class="panel">
        <div class="panel-body">

            <div class="example-box-wrapper">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>#</td>
                        <td>Row 1</td>
                        
                        <td>Row 2</td>
                        <td><a class="btn  btn-sm btn-success btn_glyph" href="#"> Publish </a></td>
                        <td>
                            <a class="btn  btn-sm btn-info btn_glyph" href="#"><i class="glyphicon glyphicon-edit"></i> Edit</a>

                            <a class="btn  btn-sm btn-danger" href="#" onclick="JavaScript:return confirm('Are you Sure do you want delete ?');"><i class="glyphicon glyphicon-trash"></i> Delete
                            </a>

                            <a class="btn  btn-sm btn-primary btn_glyph" href="#"><i class="glyphicon glyphicon-user"></i> Button</a>

                        </td>
                    </tr>

                    <tr>
                        <td>#</td>
                        <td>Row 1</td>
                        <td>Row 2</td>
                        <td><a class="btn  btn-sm btn-danger btn_glyph" href="#"> Unpublish </a></td>
                        <td>
                            <a class="btn  btn-sm btn-info btn_glyph" href="#"><i class="glyphicon glyphicon-edit"></i> Edit</a>

                            <a class="btn  btn-sm btn-danger" href="#" onclick="JavaScript:return confirm('Are you Sure do you want delete ?');"><i class="glyphicon glyphicon-trash"></i> Delete
                            </a>

                            <a class="btn  btn-sm btn-primary btn_glyph" href="#"><i class="glyphicon glyphicon-user"></i> Button</a>

                        </td>
                    </tr>

                    <tr>
                        <td>#</td>
                        <td>Row 1</td>
                        <td>Row 2</td>
                        <td><a class="btn  btn-sm btn-success btn_glyph" href="#"> Publish </a></td>
                        <td>
                            <a class="btn  btn-sm btn-info btn_glyph" href="#"><i class="glyphicon glyphicon-edit"></i> Edit</a>

                            <a class="btn  btn-sm btn-danger" href="#" onclick="JavaScript:return confirm('Are you Sure do you want delete ?');"><i class="glyphicon glyphicon-trash"></i> Delete
                            </a>

                            <a class="btn  btn-sm btn-primary btn_glyph" href="#"><i class="glyphicon glyphicon-user"></i> Button</a>

                        </td>
                    </tr>

                    <tr>
                        <td>#</td>
                        <td>Row 1</td>
                        <td>Row 2</td>
                        <td><a class="btn  btn-sm btn-danger btn_glyph" href="#"> Unpublish </a></td>
                        <td>
                            <a class="btn  btn-sm btn-info btn_glyph" href="#"><i class="glyphicon glyphicon-edit"></i> Edit</a>

                            <a class="btn  btn-sm btn-danger" href="#" onclick="JavaScript:return confirm('Are you Sure do you want delete ?');"><i class="glyphicon glyphicon-trash"></i> Delete
                            </a>

                            <a class="btn  btn-sm btn-primary btn_glyph" href="#"><i class="glyphicon glyphicon-user"></i> Button</a>

                        </td>
                    </tr>


                    <tr>
                        <td>#</td>
                        <td>Row 1</td>
                        <td>Row 2</td>
                        <td><a class="btn  btn-sm btn-success btn_glyph" href="#"> Publish </a></td>
                        <td>
                            <a class="btn  btn-sm btn-info btn_glyph" href="#"><i class="glyphicon glyphicon-edit"></i> Edit</a>

                            <a class="btn  btn-sm btn-danger" href="#" onclick="JavaScript:return confirm('Are you Sure do you want delete ?');"><i class="glyphicon glyphicon-trash"></i> Delete
                            </a>

                            <a class="btn  btn-sm btn-primary btn_glyph" href="#"><i class="glyphicon glyphicon-user"></i> Button</a>

                        </td>
                    </tr>

                    <tr>
                        <td>#</td>
                        <td>Row 1</td>
                        <td>Row 2</td>
                        <td><a class="btn  btn-sm btn-danger btn_glyph" href="#"> Unpublish </a></td>
                        <td>
                            <a class="btn  btn-sm btn-info btn_glyph" href="#"><i class="glyphicon glyphicon-edit"></i> Edit</a>

                            <a class="btn  btn-sm btn-danger" href="#" onclick="JavaScript:return confirm('Are you Sure do you want delete ?');"><i class="glyphicon glyphicon-trash"></i> Delete
                            </a>

                            <a class="btn  btn-sm btn-primary btn_glyph" href="#"><i class="glyphicon glyphicon-user"></i> Button</a>

                        </td>
                    </tr>

                    </tbody>
                </table>


                <div class="row">
                    <div class="col-sm-6"><div class="dataTables_paginate paging_bootstrap" id="datatable-example_paginate"><ul class="pagination"><li class="previous disabled"><a href="#">Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next</a></li></ul></div></div></div>



            </div>

        </div>
    </div>








@stop

@section('scripts')
<script>
$document.ready(function()
    {
        $
    });
</script>

@stop
