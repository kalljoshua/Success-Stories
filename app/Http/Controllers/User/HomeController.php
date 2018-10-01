<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Comment;
use App\Story;
use App\SubCategory;
use App\Type;
use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $trends = Story::where('trended',1)->orderBy('views','DESC')->take(4)->get();
        $videos = Video::orderBy('created_at','DESC')->take(3)->get();
        $comments = Comment::orderBy('created_at','DESC')->take(3)->get();
        $most_viewed = Story::orderBy('views','DESC')->take(4)->get();
        //$categories = SubCategory::all();
        $types = Type::orderBy('position','DESC')->get();
        return view('user.index')
            //->with('categories',$categories)
            ->with('most_viewed',$most_viewed)
            ->with('comments',$comments)
            ->with('videos',$videos)
            ->with('trends',$trends)
            ->with('types',$types);
    }

    function privacy()
    {
        return view('user.privacy');
    }

    function contact()
    {
        return view('user.contact');
    }

    function about()
    {
        return view('user.about');
    }

    function personalsafety()
    {
        return view('user.personalsafety');
    }

    function disclaimer()
    {
        return view('user.disclaimer');
    }

    function termsofUse()
    {
        return view('user.termsAndConditions');
    }

    function faq()
    {
        return view('user.faq');
    }
}
