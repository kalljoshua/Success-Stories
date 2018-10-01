<?php

namespace App\Http\Controllers\User;

use App\Story;
use App\Comment;
use App\SubCategory;
use App\Type;
use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class StoriesController extends Controller
{
    //
    public function storyListing()
    {
        $stories = Story::orderBy('created_at','DESC')->paginate(5);
        return view('user.story-listings')
            ->with('stories',$stories);
    }

    public function storyCategory(Request $request, $id)
    {
        $stories = Story::where('sub_category_id',$id)
            ->orderBy('created_at','DESC')->paginate(5);
        $category = SubCategory::where('id',$id)->first();

        return view('user.story-category')
            ->with('category',$category)
            ->with('stories',$stories);
    }

    public function allVideos()
    {
        $videos = Video::orderBy('created_at','DESC')->paginate(6);
        return view('user.video-listings')
            ->with('videos',$videos);
    }

    function showStory(Request $request, $slug)
    {

        $story = Story::where('slug',$slug)->first();
        $story->increment('views');
        $comments = $story->comments;
        $recentComments = Comment::orderBy('id','Desc')->take(4)->get();

        return view('user.story-details')
            ->with(['story'=>$story,'comments'=>$comments,
                'recentComments'=>$recentComments]);

    }

    function postComment(Request $request){
        $comment = new Comment();
        $comment->story_id  = Input::get('on_post');
        $comment->user_id  = 0;
        if(Input::has('body')) $comment->body = Input::get('body');
        if(Input::has('name')){
            $comment->name = Input::get('name');
        } else{
            $comment->name = 'Online User';
        }


        $slug = Input::get('slug');
        $posts = Story::where('slug',$slug)->first();
        $comments = $posts->comments;
        $recentComments = Comment::orderBy('id','Desc')->take(4)->get();
        if($comment->save()){
            flash('You\'ve successfully commented on this Blog')->success();
            return redirect(route('user.show.story',['slug'=>$slug]))
                ->with(['posts'=>$posts,'comments'=>$comments,
                    'recentComments'=>$recentComments]);
        }else
        {
            flash('Failed to add your comment')->success();
            return redirect(route('user.show.story',['slug'=>$slug]))
                ->with(['posts'=>$posts,'comments'=>$comments,
                    'recentComments'=>$recentComments]);
        }



    }

}
