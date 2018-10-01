@extends('...layouts.admin-layout')
@section('title')
    <title>Success Stories Africa : Categories</title>
@endsection

@section('content')

    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <h4 class="page-title">All Categories</h4>
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
                            <th>Category Name</th>
                            <th>Sub-Categories</th>
                            <th>Stories</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    <h2>{{$category->name}}</h2>
                                </td>
                                <td>{{$category->sub_categories->count()}}</td>
                                <td>
                                    {{--{{$categories->sub_categories->stories->count()}}--}}
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#" data-toggle="modal" data-target="#edit_project{{$category->id}}">
                                                    <i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#delete_project{{$category->id}}">
                                                    <i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <div id="edit_project{{$category->id}}" class="modal custom-modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="modal-content modal-lg">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Category</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('admin.edit.category')}}" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <input type="text" value="{{$category->name}}" name="name" class="form-control">
                                                    <input type="hidden" value="{{$category->id}}" name="id" class="form-control">
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

                            <div id="delete_project{{$category->id}}" class="modal custom-modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content modal-md">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Category</h4>
                                        </div>
                                        <div class="modal-body card-box">
                                            <form method="post" action="{{route('admin.delete.category')}}">
                                                {{ csrf_field() }}
                                                <p>Are you sure want to delete this?</p>
                                                <input type="hidden" name="id" value="{{$category->id}}">
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
                    <h4 class="modal-title">Add New Category</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.submit.category')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" placeholder="Title" name="name" class="form-control">
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