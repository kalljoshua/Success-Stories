<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Story;

class ActivateStoriesController extends Controller
{
    function activateStory(){
        $res = array();
        $message = "";
        $error = "";
        $status = "";

        $story_id = $_GET['story_id'];

        $state = $_GET['state'];

        if($state == 1){
            $story = Story::find($story_id);

            $story->active = 1;

            $story->save();

            $error = 0;
            $status = 1;
            $message = "Story activated";

        }elseif($state == 0){
            $story = Story::find($story_id);

            $story->active = 0;

            $story->save();

            $error = 0;
            $status = 2;
            $message = "Story un-activated";
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

    function getActivatedStories(){

        $stories = Story::where('active',1)->get();

        $res = array();

        $story_array = array();
        foreach ($stories as $story) {
            array_push($story_array,$story->id);
        }

        $res["activated"] = $story_array;
        return json_encode($res);

    }
}
