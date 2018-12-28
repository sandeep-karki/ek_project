@extends('layouts.system')
@section('title','Template List View')
@section('content')
<div class="breadcrumb-fluid">
        <div class="custom-container-fluid">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Library</a></li>
                <li class="active">Data</li>
            </ol>
        </div><!-- ends custom-container-fluid -->
    </div><!-- ends breadcrumb-fluid -->
    <div class="inner-content-fluid">
        <div class="custom-container-fluid">
            <div class="page-head clearfix">
                <div class="row">
                    <div class="col-xs-9">
                        <div class="head-title">
                            <h4>Project members</h4>
                        </div><!-- ends head-title -->
                    </div>
                    <div class="col-xs-3">
                        <button type="submit" class="btn btn-success pull-right" id="addNew"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div><!-- ends page-head -->
            <div class="panel panel-default" id="addNewpanel" style="display: none;">
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-3">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                            <div class="col-sm-3">
                                <select class="form-control">
                                    <option>Select Country</option>
                                    <option>Nepal</option>
                                    <option>India</option>
                                    <option>China</option>
                                    <option>Australia</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                            <div class="col-sm-9">
                                <label class="radio-inline">
                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                            <div class="col-sm-9">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                        Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                        Female
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                        Other
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                            <div class="col-sm-9">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                            <div class="col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        Option 1
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        Option 2
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        Option 3
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                            <div class="col-sm-3">
                                <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-default">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="content-display clearfix">
                <div class="panel panel-default">
                    <div class="panel-heading no-bdr">
                        <div class="row">
                            <div class="col-sm-8">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option>Projects</option>
                                            <option>Projects</option>
                                            <option>Projects</option>
                                            <option>Projects</option>
                                            <option>Projects</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-default">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- panel -->
                <div class="panel">
                    <div class="panel-box">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th style="width: 50%">Name</th>
                                    <th>Title</th>
                                    <th class="text-center">Title</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button" id="editbtn">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p><strong>Krishna Dangi</strong><br>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                        </a>
                                    </li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div><!-- panel -->

                <div class="panel">
                    <div class="panel-box">
                        <div class="table-responsive">
                            <table class="table">
                                <caption>Caption: Basic Table, without "table-striped", without "table-bordered", without "table-hover" and without "table-condensed" </caption>
                                <thead>
                                <tr>
                                    <th style="width: 50%">Name</th>
                                    <th>Title</th>
                                    <th class="text-center">Title</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button" id="editbtn">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p><strong>Krishna Dangi</strong><br>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                        </a>
                                    </li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div><!-- panel -->

                <div class="panel">
                    <div class="panel-box">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <caption>Caption: Table with "table-striped" </caption>
                                <thead>
                                <tr>
                                    <th style="width: 50%">Name</th>
                                    <th>Title</th>
                                    <th class="text-center">Title</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button" id="editbtn">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p><strong>Krishna Dangi</strong><br>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                        </a>
                                    </li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div><!-- panel -->

                <div class="panel">
                    <div class="panel-box">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <caption>Caption: Table with "table-bordered" </caption>
                                <thead>
                                <tr>
                                    <th style="width: 50%">Name</th>
                                    <th>Title</th>
                                    <th class="text-center">Title</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button" id="editbtn">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p><strong>Krishna Dangi</strong><br>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                        </a>
                                    </li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div><!-- panel -->

                <div class="panel">
                    <div class="panel-box">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <caption>Caption: Table with "table-hover" </caption>
                                <thead>
                                <tr>
                                    <th style="width: 50%">Name</th>
                                    <th>Title</th>
                                    <th class="text-center">Title</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button" id="editbtn">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p><strong>Krishna Dangi</strong><br>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                        </a>
                                    </li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div><!-- panel -->

                <div class="panel">
                    <div class="panel-box">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <caption>Caption: Table with "table-condensed" </caption>
                                <thead>
                                <tr>
                                    <th style="width: 50%">Name</th>
                                    <th>Title</th>
                                    <th class="text-center">Title</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button" id="editbtn">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p><strong>Krishna Dangi</strong><br>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                        </a>
                                    </li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div><!-- panel -->

                <div class="panel">
                    <div class="panel-box">
                        <div class="table-responsive">
                            <table class="table">
                                <caption>Caption:  Contextual classes to color table rows(tr) or individual cells(td). classes names: success, warning, danger, info, active </caption>
                                <thead>
                                <tr>
                                    <th style="width: 50%">Name</th>
                                    <th>Title</th>
                                    <th class="text-center">Title</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="success">
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button" id="editbtn">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr class="active">
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr class="danger">
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p><strong>Krishna Dangi</strong><br>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr class="warning">
                                    <td>
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>

                                <tr>
                                    <td class="info">
                                        <div class="name-title clearfix">
                                            <img src="{{asset('backend/images/avatar.jpg')}}" width="36" height="36">
                                            <p>Krishna Dangi</p>
                                        </div>
                                    </td>
                                    <td class="danger">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                                <option>Projects</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="success">
                                        <div class="group-tag pull-right">
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <span class="span-icon"><i class="fa fa-users" aria-hidden="true"></i>4</span>
                                            <a class="btn btn-default btn-sm" href="#" role="button">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </div><!-- ends group-tag -->
                                    </td>
                                </tr>
                                <tr class="colsp-tr">
                                    <td colspan="3" style="border: none;">
                                        <div class="panel panel-default" id="editbtnpanel" style="display: none;">
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-3">
                                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control">
                                                                <option>Select Country</option>
                                                                <option>Nepal</option>
                                                                <option>India</option>
                                                                <option>China</option>
                                                                <option>Australia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                                        <div class="col-sm-9">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                                    Female
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                                        <div class="col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 1
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 2
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    Option 3
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-3">
                                                            <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-default">Sign in</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display: none"><td></td></tr>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                        </a>
                                    </li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div><!-- panel -->
            </div><!-- ends content-display -->


            <div class="content-display clearfix">
                <div class="panel panel-default">
                    <div class="panel-heading no-bdr">
                        <div class="row">
                            <div class="col-sm-8">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option>Projects</option>
                                            <option>Projects</option>
                                            <option>Projects</option>
                                            <option>Projects</option>
                                            <option>Projects</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-default">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- panel -->
                <div class="panel">
                    <div class="panel-box">
                        <div class="table-responsive">
                            <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example_length"><label>Show <select name="example_length" aria-controls="example" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example" class="table table-striped table-bordered dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
                                            <thead>
                                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 169px;">Name</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 264px;">Position</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 122px;">Office</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 60px;">Age</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 124px;">Start date</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 98px;">Salary</th></tr>
                                            </thead>
                                            <tbody>

























































                                            <tr role="row" class="odd">
                                                <td class="sorting_1">Airi Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008/11/28</td>
                                                <td>$162,700</td>
                                            </tr><tr role="row" class="even">
                                                <td class="sorting_1">Angelica Ramos</td>
                                                <td>Chief Executive Officer (CEO)</td>
                                                <td>London</td>
                                                <td>47</td>
                                                <td>2009/10/09</td>
                                                <td>$1,200,000</td>
                                            </tr><tr role="row" class="odd">
                                                <td class="sorting_1">Ashton Cox</td>
                                                <td>Junior Technical Author</td>
                                                <td>San Francisco</td>
                                                <td>66</td>
                                                <td>2009/01/12</td>
                                                <td>$86,000</td>
                                            </tr><tr role="row" class="even">
                                                <td class="sorting_1">Bradley Greer</td>
                                                <td>Software Engineer</td>
                                                <td>London</td>
                                                <td>41</td>
                                                <td>2012/10/13</td>
                                                <td>$132,000</td>
                                            </tr><tr role="row" class="odd">
                                                <td class="sorting_1">Brenden Wagner</td>
                                                <td>Software Engineer</td>
                                                <td>San Francisco</td>
                                                <td>28</td>
                                                <td>2011/06/07</td>
                                                <td>$206,850</td>
                                            </tr><tr role="row" class="even">
                                                <td class="sorting_1">Brielle Williamson</td>
                                                <td>Integration Specialist</td>
                                                <td>New York</td>
                                                <td>61</td>
                                                <td>2012/12/02</td>
                                                <td>$372,000</td>
                                            </tr><tr role="row" class="odd">
                                                <td class="sorting_1">Bruno Nash</td>
                                                <td>Software Engineer</td>
                                                <td>London</td>
                                                <td>38</td>
                                                <td>2011/05/03</td>
                                                <td>$163,500</td>
                                            </tr><tr role="row" class="even">
                                                <td class="sorting_1">Caesar Vance</td>
                                                <td>Pre-Sales Support</td>
                                                <td>New York</td>
                                                <td>21</td>
                                                <td>2011/12/12</td>
                                                <td>$106,450</td>
                                            </tr><tr role="row" class="odd">
                                                <td class="sorting_1">Cara Stevens</td>
                                                <td>Sales Assistant</td>
                                                <td>New York</td>
                                                <td>46</td>
                                                <td>2011/12/06</td>
                                                <td>$145,600</td>
                                            </tr><tr role="row" class="even">
                                                <td class="sorting_1">Cedric Kelly</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>Edinburgh</td>
                                                <td>22</td>
                                                <td>2012/03/29</td>
                                                <td>$433,060</td>
                                            </tr></tbody>
                                            <tfoot>
                                            <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
                                            </tfoot>
                                        </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example_next"><a href="#" aria-controls="example" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
                        </div>
                    </div>
                </div><!-- panel -->
            </div><!-- ends content-display -->


            <div class="content-display clearfix">
                <div class="panel panel-default">
                    <div class="panel-heading no-bdr">
                        <div class="row">
                            <div class="col-sm-8">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option>Projects</option>
                                            <option>Projects</option>
                                            <option>Projects</option>
                                            <option>Projects</option>
                                            <option>Projects</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-default">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- panel -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-3">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Text</label>
                                <div class="col-sm-9">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <p class="form-control-static">email@example.com</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword2" class="sr-only">Password</label>
                                            <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-default">Confirm identity</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Text</label>
                                <div class="col-sm-9">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="text">
                                            <label>Name</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="text">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Check</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Text</label>
                                <div class="col-sm-9">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">$</div>
                                                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
                                                <div class="input-group-addon">.00</div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Transfer cash</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                                <div class="col-sm-3">
                                    <select class="form-control">
                                        <option>Select Country</option>
                                        <option>Nepal</option>
                                        <option>India</option>
                                        <option>China</option>
                                        <option>Australia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-9">
                                    <label class="radio-inline">
                                        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-9">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                            Male
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                            Female
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                            Other
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                <div class="col-sm-9">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Checkbox</label>
                                <div class="col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">
                                            Option 1
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">
                                            Option 2
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">
                                            Option 3
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-3">
                                    <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-default">Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- panel -->

                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label text-left">Name</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="First Name">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label text-left">Email</label>
                                <div class="col-sm-3">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label text-left">Text</label>
                                <div class="col-sm-9">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <p class="form-control-static">email@example.com</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword2" class="sr-only">Password</label>
                                            <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-default">Confirm identity</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label text-left">Text</label>
                                <div class="col-sm-9">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="text">
                                            <label>Name</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="text">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Check</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label text-left">Text</label>
                                <div class="col-sm-9">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">$</div>
                                                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
                                                <div class="input-group-addon">.00</div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Transfer cash</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label text-left">Country</label>
                                <div class="col-sm-3">
                                    <select class="form-control">
                                        <option>Select Country</option>
                                        <option>Nepal</option>
                                        <option>India</option>
                                        <option>China</option>
                                        <option>Australia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label text-left">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label text-left">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label text-left">Message</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label text-left">Gender</label>
                                <div class="col-sm-9">
                                    <label class="radio-inline">
                                        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label text-left">Gender</label>
                                <div class="col-sm-9">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                            Male
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                            Female
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                            Other
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label text-left">Checkbox</label>
                                <div class="col-sm-9">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label text-left">Checkbox</label>
                                <div class="col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">
                                            Option 1
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">
                                            Option 2
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">
                                            Option 3
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label text-left">Address</label>
                                <div class="col-sm-3">
                                    <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-default">Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- panel -->

                <div class="panel panel-default">
                    <div class="panel-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">&nbsp;</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Middle Name">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">&nbsp;</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Text</label>
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <p class="form-control-static">email@example.com</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword2" class="sr-only">Password</label>
                                                <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                                            </div>
                                            <button type="submit" class="btn btn-default">Confirm identity</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Text</label>
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="text">
                                                <label>Name</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="text">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Check</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Text</label>
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">$</div>
                                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
                                                    <div class="input-group-addon">.00</div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Transfer cash</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Country</label>
                                        <select class="form-control">
                                            <option>Select Country</option>
                                            <option>Nepal</option>
                                            <option>India</option>
                                            <option>China</option>
                                            <option>Australia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Country</label>
                                        <textarea class="form-control" rows="5" placeholder="Message Here"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gender</label>
                                        <div class="form-group">
                                            <label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Other
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gender</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                Male
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                Female
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                Other
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Checkbox</label>
                                        <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="inlineCheckbox1" value="option1"> Option 1
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="inlineCheckbox2" value="option2"> Option 2
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Option 3
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Checkbox</label>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="">
                                                Option 1
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="">
                                                Option 2
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="">
                                                Option 3
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">File</label>
                                        <input type="file" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Check Me Out</label>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Check me out
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div><!-- panel -->

            </div><!-- ends content-display -->



        </div><!-- ends custom-container-fluid -->
    </div><!-- ends inner-content-fluid -->
@stop
@section('scripts')
    <script>
        $(document).ready(function(){
            $("#editbtn").click(function(){
                $("#editbtnpanel").slideToggle("slow");
            });
        });
    </script>

@stop