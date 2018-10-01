<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Advert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ActivateAdvertController extends Controller
{
    function activateAdvert(){
        $res = array();
        $message = "";
        $error = "";
        $status = "";

        $advert_id = $_GET['advert_id'];

        $state = $_GET['state'];

        if($state == 1){
            $advert = Advert::find($advert_id);

            $advert->active = 1;

            $advert->save();

            $error = 0;
            $status = 1;
            $message = "advert activated";

        }elseif($state == 0){
            $advert = Advert::find($advert_id);

            $advert->active = 0;

            $advert->save();

            $error = 0;
            $status = 2;
            $message = "Advert Deactivated";
        }else{
            $error = 0;
            $status = 3;
            $message = "Active state unknown";
        }

        $res['error'] = $error;
        $res['status'] = $status;
        $res['message'] = $message;

        return json_encode($res);
    }

    function getActivatedAdverts(){

        $adverts= Advert::where('active',1)->get();

        $res = array();

        $advert_array = array();
        foreach ($adverts as $advert) {
            array_push($advert_array,$advert->id);
        }

        $res["activated"] = $advert_array;
        return json_encode($res);

    }
}