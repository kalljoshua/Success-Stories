@extends('...layouts.admin-layout')
@section('title')Watch
    <title>Success Stories Africa : Pending Stories</title>
@endsection

@section('content')

    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <h4 class="page-title">Pending Stories</h4>Watch
            </div>
            <div class="col-sm-8 text-right m-b-20">
                <a href="#" class="btn btn-primary rounded pull-right"
                   data-toggle="modal" data-target="#create_project">
                    <i class="fa fa-plus"></i> Compose
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Sub-Category</th>
                            <th>Date</th>
                            <th>Activate</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pending as $story)
                            <tr>
                                <td>
                                    <h2>{{$story->title}}</h2>
                                </td>
                                <td>{{$story->type->name}}</td>
                                <td>
                                    <ul class="team-members">
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="{{$story->author}}">
                                                <img src="/admin_inc/assets/img/user.jpg" alt="{{$story->author}}"></a>
                                        </li>
                                    </ul>
                                </td>

                                <td>
                                    {{$story->sub_category->category->name}}
                                </td>
                                <td>{{$story->sub_category->name}} </td>
                                <td>
                                    {{$story->created_at}}
                                </td>
                                <td style="text-transform: lowercase">
                                    <!-- Rounded switch -->
                                    <label class="switch">
                                        <input type="checkbox" id="act-check-story{{$story->id}}"
                                               data-property-id="{{$story->id}}"
                                               onchange="activatestory({{$story->id}});">
                                        <div class="slider round"></div>
                                    </label>
                                </td>
                                <td>
                                    <div class="dropdown action-label">
                                        <a class="btn btn-white btn-sm rounded dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false">
                                            @if($story->active == 1)
                                                <i class="fa fa-dot-circle-o text-success"></i> Active</a>
                                        @else
                                            <i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                        @endif
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                           aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#" data-toggle="modal" data-target="#edit_project{{$story->id}}">
                                                    <i class="fa fa-pencil m-r-5"></i> Edit</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#delete_project{{$story->id}}">
                                                    <i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <div id="edit_project{{$story->id}}" class="modal custom-modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="modal-content modal-lg">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Story</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('admin.story.edit')}}" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <input type="text" value="{{$story->title}}" name="title" class="form-control">
                                                    <input type="hidden" value="{{$story->id}}" name="id" class="form-control">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <select type="text" name="type" class="form-control">
                                                                <option value="">Most Viewed</option>
                                                                @foreach($types as $type)
                                                                    <option @if($story->type_id == $type->id) selected @endif value="{{$type->id}}">{{$type->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <select type="text" id="property-type" name="category" class="form-control">
                                                                <option value="">Select Category</option>
                                                                @foreach($categories as $category)
                                                                    <option @if($story->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <select type="text"  name="sub_category" id="subcategory_id" class="form-control">
                                                                @foreach($sub_categories as $sub_category)
                                                                    <option @if($story->sub_category_id == $sub_category->id) selected @endif value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" placeholder="Hash Tags" class="form-control">
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
                                                <div class="form-group">
                                    <textarea name="body" rows="8" cols="5" class="form-control summernote"
                                              placeholder="Write your story here">{{$story->body}}</textarea>
                                                </div>
                                                <div class="form-group m-b-0">
                                                    <div class="text-center">
                                                        <button class="btn btn-primary"><span>Send</span> <i class="fa fa-send m-l-5"></i></button>
                                                        <button class="btn btn-success m-l-5" type="button">
                                                            <span>Draft</span> <i class="fa fa-floppy-o m-l-5"></i></button>
                                                        <button class="btn btn-success m-l-5" type="button">
                                                            <span>Delete</span> <i class="fa fa-trash-o m-l-5"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="delete_project{{$story->id}}" class="modal custom-modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content modal-md">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Story</h4>
                                        </div>
                                        <div class="modal-body card-box">
                                            <form method="post" action="{{route('admin.delete.story')}}">
                                                {{ csrf_field() }}
                                                <p>Are you sure want to delete this?</p>
                                                <input type="hidden" name="id" value="{{$story->id}}">
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
                    <h4 class="modal-title">Compose Story</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.story.submit')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" placeholder="Title" name="title" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select type="text" name="type" class="form-control">
                                        <option value="1">Most Viewed</option>
                                        <option>Latest from sports</option>
                                        <option>Watch</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select type="text" name="category" class="form-control">
                                        <option value="1">Most Viewed</option>
                                        <option>Latest from sports</option>
                                        <option>Watch</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select type="text" name="sub_category" class="form-control">
                                        <option value="1">Most Viewed</option>
                                        <option>Latest from sports</option>
                                        <option>Watch</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Hash Tags" class="form-control">
                        </div>
                        {{--<div class="form-group">
                            <div class="row">
                                <?php for($i=1; $i<=4; $i++){?>
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
													<input type="file" name="image[]">
													</span>
                                                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">
                                                    Remove </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>--}}
                        <div class="form-group">
                            <textarea name="body" rows="8" cols="5" class="form-control summernote"
                                      placeholder="Write your story here"></textarea>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="text-center">
                                <button class="btn btn-primary"><span>Send</span> <i class="fa fa-send m-l-5"></i></button>
                                <button class="btn btn-success m-l-5" type="button">
                                    <span>Draft</span> <i class="fa fa-floppy-o m-l-5"></i></button>
                                <button class="btn btn-success m-l-5" type="button">
                                    <span>Delete</span> <i class="fa fa-trash-o m-l-5"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection