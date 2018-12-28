@extends('layouts.system')

@section('title', 'Templates Form View')

@section('content')

        <div id="page-title">
            <h2>Form Title</h2>
        </div>


        <div class="panel panel-default">
            <div class="panel-body">
                    <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal bordered-row" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 col-sm-2 control-label">Textbox Example:</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="name" type="text" value="" id="name">
                            </div></div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Checkboxes</label>
                            <div class="col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input value="" type="checkbox">
                                        Checkbox 1
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input value="" type="checkbox">
                                        Checkbox 2
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input value="" type="checkbox">
                                        Checkbox 3
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input disabled="" value="" type="checkbox">
                                        Disabled checkbox
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Inline checkbox</label>
                            <div class="col-sm-10">
                                <label class="checkbox-inline">
                                    <input id="" value="option1" type="checkbox">
                                    Checkbox 1
                                </label>
                                <label class="checkbox-inline">
                                    <input id="" value="option2" type="checkbox">
                                    Checkbox 2
                                </label>
                                <label class="checkbox-inline">
                                    <input id="" value="option3" type="checkbox">
                                    Checkbox 3
                                </label>
                                <label class="checkbox-inline">
                                    <input disabled="" id="" value="option4" type="checkbox">
                                    Disabled checkbox
                                </label>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Custom radio</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input name="example-radio1" value="" type="radio">
                                        Radio 1
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input name="example-radio1" value="" type="radio">
                                        Radio 2
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input name="example-radio1" value="" type="radio">
                                        Radio 3
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input name="example-radio1" disabled="" value="" type="radio">
                                        Disabled radio
                                    </label>
                                </div>
                            </div>
                        </div>




                        <div class="form-group">
                            <label class="col-sm-2 control-label">Inline radio</label>
                            <div class="col-sm-10">
                                <label class="radio-inline">
                                    <input id="" name="example-radio1" value="option1" type="radio">
                                    Radio 1
                                </label>
                                <label class="radio-inline">
                                    <input id="" name="example-radio1" value="option2" type="radio">
                                    Radio 2
                                </label>
                                <label class="radio-inline">
                                    <input id="" name="example-radio1" value="option3" type="radio">
                                    Radio 3
                                </label>
                                <label class="radio-inline">
                                    <input disabled="" id="" name="example-radio1" value="option4" type="radio">
                                    Disabled radio
                                </label>
                            </div>
                        </div>




                        <div class="form-group">
                            <label class="col-sm-2 control-label">Textarea</label>
                            <div class="col-sm-8">
                                <textarea name="" id="" class="form-control" rows="10"></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">Textarea with Editor</label>
                            <div class="col-sm-10">
                                <textarea name="" id="" class="form-control texteditor" rows="10"></textarea>
                            </div>
                        </div>





                        <div class="form-group">
                            <label class="col-sm-2 control-label">Select</label>
                            <div class="col-sm-6">
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>




                        <div class="form-group">
                            <label class="col-sm-2 control-label">Basic File Upload</label>
                            <div class="col-sm-5">
                                <input class="form-control" id="" type="file">
                            </div>
                        </div>





                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Basic Date Picker</label>
                            <div class="col-sm-5">
                                <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon">
                                        <i class="glyph-icon icon-calendar"></i>
                                    </span>
                                    <input class="bootstrap-datepicker form-control" value="" data-date-format="YYYY-MM-DD" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Basic Date Range Picker</label>
                            <div class="col-sm-5">
                                <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon">
                                        <i class="glyph-icon icon-calendar"></i>
                                    </span>
                                    <input class="bootstrap-datepicker-range form-control" value="" data-date-format="YYYY-MM-DD" type="text">
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Basic Time Range Picker</label>
                            <div class="col-sm-5">
                                <div class="bootstrap-timepicker dropdown">
                                    <input class="timepicker-example form-control" type="text" id="duration">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" onclick="return false" class="btn btn-primary">Add</button>
                                <a class="btn btn-warning" onclick="history.go(-1);">Cancel</a>

                            </div></div>

                    </form>

            </div>
        </div>



@stop
@section('scripts')
    <!-- Include Date Range Picker -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script type="text/javascript">


        $(function() {

            $('.bootstrap-datepicker-range').daterangepicker(
                {
                    locale: {
                        format: 'YYYY-MM-DD'
                    },

                });

        });

        $(function() {

            $('.bootstrap-datepicker').daterangepicker(
                {
                    locale: {
                        format: 'YYYY-MM-DD'
                    },
                    singleDatePicker: true,

                });

        });

        $('#duration').daterangepicker({
            timePicker: true,
            timePicker24Hour: true,
            timePickerIncrement: 1,
            timePickerSeconds: true,
            locale: {
                format: 'HH:mm:ss'
            },
        }).on('show.daterangepicker', function (ev, picker) {
            picker.container.find(".calendar-table").hide();
        });

    </script>
    @stop









