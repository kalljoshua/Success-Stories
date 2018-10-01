<?php

namespace App\Http\Controllers\Admin;

use App\Story;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTrendStoriesController extends Controller
{
    function trendStory(){
        $res = array();
        $message = "";
        $error = "";
        $status = "";

        $story_id = $_GET['story_id'];

        $state = $_GET['state'];

        if($state == 1){
            $story = Story::find($story_id);

            $story->trended = 1;

            $story->save();

            $error = 0;
            $status = 1;
            $message = "Story Trended";

        }elseif($state == 0){
            $story = Story::find($story_id);

            $story->trended = 0;

            $story->save();

            $error = 0;
            $status = 2;
            $message = "Story untrended";
        }else{
            $error = 0;
            $status = 3;
            $message = "Trending state unknown";
        }

        $res['error'] = $error;
        $res['status'] = $status;
        $res['message'] = $message;

        return json_encode($res);
    }

    function getTrendedStories(){

        $stories = Story::where('trended',1)->get();

        $res = array();

        $story_array = array();
        foreach ($stories as $story) {
            array_push($story_array,$story->id);
        }

        $res["trended"] = $story_array;
        return json_encode($res);

    }
}
