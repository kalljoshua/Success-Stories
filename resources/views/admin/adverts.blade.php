@extends('...layouts.admin-layout')
@section('title')
    <title>Success Stories Africa : Adverts</title>
@endsection

@section('content')

    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <h4 class="page-title">All Adverts</h4>
            </div>
            <div class="col-sm-8 text-right m-b-20">
                <a href="#" class="btn btn-primary rounded pull-right"
                   data-toggle="modal" data-target="#create_project">
                    <i class="fa fa-plus"></i> Create New
                </a>
            </div>
        </div>
        {{--<div class="row filter-row">
            <div class="col-sm-3 col-xs-6">
                <div class="form-group form-focus">
                    <label class="control-label">Project Name</label>
                    <input type="text" class="form-control floating" />
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group form-focus">
                    <label class="control-label">Employee Name</label>
                    <input type="text" class="form-control floating" />
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group form-focus select-focus">
                    <label class="control-label">Role</label>
                    <select class="select floating">
                        <option value="">Select Roll</option>
                        <option value="">Web Developer</option>
                        <option value="1">Web Designer</option>
                        <option value="1">Android Developer</option>
                        <option value="1">Ios Developer</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <a href="#" class="btn btn-success btn-block"> Search </a>
            </div>
        </div>--}}
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                        <tr>
                            <th>Type Name</th>
                            <th>Position</th>
                            <th>Url</th>
                            <th>Image</th>
                            <th>Activate</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($adverts as $advert)
                            <tr>
                                <td>
                                    <h2>{{$advert->name}}</h2>
                                </td>
                                <td>{{$advert->section}}</td>
                                <td>
                                    {{$advert->url}}
                                </td>
                                <td>
                                    <img src="/images/advert/admin_listing_99x99/{{$advert->image}}" alt="{{$advert->name}}">
                                </td>
                                <td style="text-transform: lowercase">
                                    <!-- Rounded switch -->
                                    <label class="switch">
                                        <input type="checkbox" id="rec-check-advert{{$advert->id}}"
                                               data-property-id="{{$advert->id}}"
                                               onchange="activateAdvert({{$advert->id}});">
                                        <div class="slider round"></div>
                                    </label>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#" data-toggle="modal" data-target="#edit_project{{$advert->id}}">
                                                    <i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#delete_project{{$advert->id}}">
                                                    <i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <div id="edit_project{{$advert->id}}" class="modal custom-modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="modal-content modal-lg">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Advert</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('admin.edit.advert')}}" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}-
                                                <div class="form-group">
                                                    <input type="text" value="{{$advert->name}}" name="name" class="form-control">
                                                    <input type="hidden" value="{{$advert->id}}" name="id" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" value="{{$advert->url}}" name="url" class="form-control">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <select type="text" name="section" class="form-control">
                                                                <option @if($advert->section =='1') selected @endif value="1">Header Section</option>
                                                                <option @if($advert->section =='2') selected @endif value="2">Page Section</option>
                                                                <option @if($advert->section =='3') selected @endif value="3">Side Bar</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="form-group ">
                                                            <div class="col-md-3">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                                                         style="width: 200px; height: 150px;">
                                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                                                    </div>
                                                                    <div>
                                                                        <span class="btn btn-default btn-file">
                                                                        <span class="fileinput-new">
                                                                        Select image </span>
                                                                        <span class="fileinput-exists">
                                                                        Change </span>
                                                                        <input type="file" name="photo">
                                                                        </span>
                                                                        <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">
                                                                            Remove </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group m-b-0">
                                                    <div class="text-center">
                                                        <button class="btn btn-primary"><span>Submit</span>
                                                            <i class="fa fa-send m-l-5"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="delete_project{{$advert->id}}" class="modal custom-modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content modal-md">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Advert</h4>
                                        </div>
                                        <div class="modal-body card-box">
                                            <form method="post" action="{{route('admin.destroy.advert')}}">
                                                {{ csrf_field() }}
                                                <p>Are you sure want to delete this?</p>
                                                <input type="hidden" name="id" value="{{$advert->id}}">
                                                <div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="create_project" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Advert</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.submit.advert')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" placeholder="Advert Title" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Web Link (https://website.com)" name="url" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select type="text" name="section" class="form-control">
                                        <option value="">Select Display Section</option>
                                        <option value="1">Header Section</option>
                                        <option value="2">Page Section</option>
                                        <option value="3">Side Bar</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group ">
                                    <div class="col-md-3">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                                 style="width: 200px; height: 150px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                            </div>
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileinput-new">Select image </span>
                                                    <span class="fileinput-exists">Change </span>
                                                    <input type="file" name="photo">
                                                </span>
                                                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">
                                                    Remove </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="text-center">
                                <button class="btn btn-primary"><span>Submit</span>
                                    <i class="fa fa-send m-l-5"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection