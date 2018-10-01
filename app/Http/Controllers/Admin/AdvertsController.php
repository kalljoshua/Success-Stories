<?php

namespace App\Http\Controllers\Admin;

use App\Advert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AdvertsController extends Controller
{
    public function showAllAdvert()
    {
        $adverts = Advert::all();
        return view('admin.adverts')
            ->with('adverts',$adverts);
    }

    public function addAdvert(Request $request)
    {
        $advert = new Advert();
        $advert->name = $request->input('name');
        $advert->url = $request->input('url');
        $advert->section = $request->input('section');

        if($request->hasFile('photo')){
            $photoName = $request->input('name').'.'.$request->photo->extension();

            $photoName = str_replace(' ', '_', $photoName);

            if($path = $request->photo->move(public_path().'/cache_uploads/', $photoName)){

                $advert->image = $photoName;

                $advert->save();

                $path = public_path().'/cache_uploads/'.$photoName;

                $this->resizePostImage($path,$photoName);

            }else{
                flash('File processing error, Please try again later.')->error();
                return redirect(route('admin.adverts'));
            }
        }

        if ($advert->save()){
            flash('Your Advert has successfully been added.')->success();
            return redirect(route('admin.adverts'));
        }else {
            flash('Failed to add your advert')->error();
            return redirect(route('admin.adverts'));
        }


    }

    public function activateAdvert()
    {

    }

    public function editAdvert(Request $request)
    {
        $advert = Advert::find($request->input('id'));
        $advert->name = $request->input('name');
        $advert->url = $request->input('url');
        $advert->section = $request->input('section');

        if($request->hasFile('photo')){
            $photoName = $request->input('name').'.'.$request->photo->extension();

            $photoName = str_replace(' ', '_', $photoName);

            if($path = $request->photo->move(public_path().'/cache_uploads/', $photoName)){

                $advert->image = $photoName;

                $path = public_path().'/cache_uploads/'.$photoName;

                $this->resizePostImage($path,$photoName);

            }
        }

        if ($advert->save()){
            flash('Your Story has successfully been added.')->success();
            return redirect(route('admin.adverts'));
        }else {
            flash('Failed to add Story')->error();
            return redirect(route('admin.adverts'));
        }
    }

    public function destroyAdvert(Request $request)
    {
        $id = $request->input('id');

        if(Advert::destroy($id)){
            flash('Post deleted successfully')->success();
            return redirect()->route('admin.adverts');
        }else{
            flash('Failed to delete post')->error();
            return redirect()->route('admin.adverts');
        }
    }


    function resizePostImage($path,$image_name)
    {

        ini_set('memory_limit','256M');
        ini_set('max_execution_time', 600);

        $image_path = $path;

        Image::make($image_path)
            ->resize(728, 90)
            ->save(public_path().'/images/advert/wide_810x400/'.$image_name);

        Image::make($image_path)
            ->resize(300, 250)
            ->save(public_path().'/images/advert/large_3000x250/'.$image_name);


        Image::make($image_path)
            ->resize(99, 99)
            ->save(public_path().'/images/advert/admin_listing_99x99/'.$image_name);

    }
}
