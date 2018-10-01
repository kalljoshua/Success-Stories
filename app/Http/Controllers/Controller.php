<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Comment;
use App\Story;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $categories = Category::all();
        $comments = Comment::orderBy('created_at','DESC')->take(3)->get();
        $most_viewed = Story::orderBy('views','DESC')->take(4)->get();
        $search = Story::orderBy('views','DESC')->take(3)->get();
        $banners_side = Advert::where('active',1)
            ->where('section',3)->first();
        $banners_page = Advert::where('active',1)
            ->where('section',2)->first();
        $banners_header = Advert::where('active',1)
            ->where('section',1)->first();

        View::share ( 'comments',$comments );
        View::share ( 'most_viewed',$most_viewed );
        View::share ( 'search',$search );
        View::share ( 'banner_side',$banners_side );
        View::share ( 'banner_page',$banners_page );
        View::share ( 'banner_header',$banners_header );
        View::share ( 'categories',$categories );
    }
}
