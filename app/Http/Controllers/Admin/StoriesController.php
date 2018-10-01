<?php

namespace App\Http\Controllers\Admin;


use App\Category;
use App\SubCategory;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Story;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class StoriesController extends Controller
{

    public function compose()
    {
        $types = Type::all();
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        return view('admin.compose')
            ->with('types',$types)
            ->with('sub_categories',$sub_categories)
            ->with('categories',$categories);
    }

    public function getSubCategories(Request $request, $id){
        if($request->ajax()){

            $sector = SubCategory::where('category_id',$id)->get();
            return $sector;
            return Response::json( $sector );;

        }
    }


    public function adminPendingStory()
    {
        $types = Type::all();
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $pending = Story::where('active',0)->get();
        return view('admin.pending-stories')
            ->with('types',$types)
            ->with('sub_categories',$sub_categories)
            ->with('categories',$categories)
            ->with('pending',$pending);
    }

    //submit story to database
    public function storySubmit(Request $request)
    {
        $story = new Story();
        $story->title = $request->input('title');
        $story->type_id = $request->input('type');
        $story->category_id = $request->input('category');
        $story->sub_category_id = $request->input('sub_category');
        $story->author = $request->input('author');
        $story->body = $request->input('body');
        $slug_clean = str_replace(' ', '_', $request->input('title'));
        $story->slug = $slug_clean;

        if($request->hasFile('photo')){

            $photoName = preg_replace("#[[:punct:]]#", "", $request->input('title')).'.'.$request->photo->extension();

            $photoName = str_replace(' ', '_', $photoName);

            if($path = $request->photo->move(public_path().'/cache_uploads/', $photoName)){

                $story->image = $photoName;

                $story->save();

                $path = public_path().'/cache_uploads/'.$photoName;

                $this->resizePostImage($path,$photoName);

            }else{
                flash('File processing error, Please try again later.')->error();
                return redirect(route('admin.stories'));
            }
        }

        if ($story->save()){
            flash('Your Story has successfully been added.')->success();
            return redirect(route('admin.stories'));
        }else {
            flash('Failed to add your story')->error();
            return redirect(route('admin.stories'));
        }

    }

    public function adminStories()
    {
        $stories = Story::all();
        $types = Type::all();
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        return view('admin.stories')
            ->with('types',$types)
            ->with('sub_categories',$sub_categories)
            ->with('categories',$categories)
            ->with('stories',$stories);
    }

    public function adminDeleteStory(Request $request)
    {
        $id = $request->input('id');

        if(Story::destroy($id)){
            flash('Post deleted successfully')->success();
            return redirect()->route('admin.stories');
        }else{
            flash('Failed to delete post')->error();
            return redirect()->route('admin.stories');
        }
    }

    public function adminEditStory(Request $request)
    {
        $story = Story::find($request->input('id'));
        $story->title = $request->input('title');
        $story->type_id = $request->input('type');
        $story->category_id = $request->input('category');
        $story->sub_category_id = $request->input('sub_category');
        $story->author = $request->input('author');
        $story->body = $request->input('body');
        $slug_clean = str_replace(' ', '_', $request->input('title'));
        $story->slug = $slug_clean;


        if($request->hasFile('photo')){
            $photoName = preg_replace("#[[:punct:]]#", "",$request->input('title')).'.'.$request->photo->extension();

            $photoName = str_replace(' ', '_', $photoName);

            if($path = $request->photo->move(public_path().'/cache_uploads/', $photoName)){

                $story->image = $photoName;

                $path = public_path().'/cache_uploads/'.$photoName;

                $this->resizePostImage($path,$photoName);

            }
        }

        if ($story->save()){
            flash('Your Story has successfully been added.')->success();
            return redirect(route('admin.stories'));
        }else {
            flash('Failed to add Story')->error();
            return redirect(route('admin.stories'));
        }
    }



    function resizePostImage($path,$image_name)
    {

        ini_set('memory_limit','256M');
        ini_set('max_execution_time', 600);

        $image_path = $path;

        Image::make($image_path)
            ->resize(810, 400)
            ->save(public_path().'/images/blog/user_810x400/'.$image_name);

        Image::make($image_path)
            ->resize(470, 235)
            ->save(public_path().'/images/blog/user_470x235/'.$image_name);

        Image::make($image_path)
            ->resize(950, 750)
            ->save(public_path().'/images/blog/listing_950x750/'.$image_name);


        Image::make($image_path)
            ->resize(99, 99)
            ->save(public_path().'/images/blog/admin_listing_99x99/'.$image_name);

    }
}
