<?php

namespace App\Http\Controllers\Admin;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Input;

class VideosController extends Controller
{
    //
    public function showAllVideos()
    {
        $videos = Video::all();
        return view('admin.videos')
            ->with('videos',$videos);
    }

    public function addVideo()
    {
        $video = new Video();
        if(Input::has('title')) $video->title = Input::get('title');
        if(Input::has('body')) $video->body = Input::get('body');
        if(Input::has('url')) $video->url = Input::get('url');
        $video->admin_id = Auth::guard('admin')->id();

        if ($video->save())
        {
            flash('Video has successfully been added.')->success();
            return redirect(route('admin.videos'));
        }else{
            flash('Video failed to add.')->error();
            return redirect(route('admin.videos'));
        }
    }

    public function editVideo(Request $request)
    {
        $video = Video::find($request->input('id'));
        if(Input::has('title')) $video->title = Input::get('title');
        if(Input::has('body')) $video->body = Input::get('body');
        if(Input::has('url')) $video->url = Input::get('url');
        $video->admin_id = Auth::guard('admin')->id();

        if ($video->save())
        {
            flash('Video has successfully been added.')->success();
            return redirect(route('admin.videos'));
        }else{
            flash('Video failed to add.')->error();
            return redirect(route('admin.videos'));
        }
    }

    public function destroyVideo(Request $request)
    {
        $id = $request->input('id');

        if(Video::destroy($id)){
            flash('Videos deleted successfully')->success();
            return redirect()->route('admin.videos');
        }else{
            flash('Failed to delete Video')->error();
            return redirect()->route('admin.videos');
        }
    }
}
