<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Type;
use App\SubCategory;
use Input,Redirect;

class CategoryTypeController extends Controller
{
    //
    public function showAllCategory()
    {
        # code...
        $categories = Category::all();
        return view('admin.all-categories')
            ->with('categories',$categories);
    }

    public function categoriesForm()
    {
        return view('admin.new_category');
    }
    public function addCategory(){

        $category = new Category();
        if(Input::has('name')) $category->name = Input::get('name');
        if(Input::has('description')) $category->description = Input::get('description');
        if($category->save())
        {
            flash('Category has successfully been added.')->success();
            return redirect(route('admin.categories'));
        }else{
            flash('Category failed to add.')->error();
            return redirect(route('admin.categories'));
        }
;
    }

    public function editCategory(Request $request)
    {
        if(Input::has('id')) $id = Input::get('id');
        $category = Category::find($id);
        if(Input::has('name')) $category->name = Input::get('name');
        if(Input::has('description')) $category->description = Input::get('description');
        if($category->save())
        {
            flash('Category has successfully been Edited.')->success();
            return redirect(route('admin.categories'));
        }else{
            flash('Failed to edit Category')->error();
            return redirect(route('admin.categories'));
        }
    }

    function delete(Request $request,$id){
        $category = Category::find($id);
        return view('admin.admin_category_delete')
            ->with('category',$category);
    }

    function destroyCategory(Request $request){
        $id = $request->input('id');

        if(Category::destroy($id)){
            flash('Category deleted successfully')->success();
            return redirect()->route('admin.categories');
        }else{
            flash('Failed to delete category')->error();
            return redirect()->route('admin.categories');
        }
    }

    public function showAllSubCategory()
    {
        # code...
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        return view('admin.all-sub-categories')
            ->with('categories',$categories)
            ->with('sub_categories',$sub_categories);
    }

    public function subcategoriesForm()
    {
        $categories = Category::all();
        return view('admin.new_subcategory')
            ->with('categories',$categories);
    }


    public function addSubCategory(){
        # code...
        $sub_category = new SubCategory();
        if(Input::has('name')) $sub_category->name = Input::get('name');
        if(Input::has('category_id')) $sub_category->category_id = Input::get('category_id');
        if($sub_category->save())
        {
            flash('Sub-Category has successfully been added.')->success();
            return redirect(route('admin.sub-categories'));
        }else{
            flash('Sub-Category failed to be added.')->warning();
            return redirect(route('admin.sub-categories'));
        }

        //return "submition awaiting";
    }

    public function editSubCategory(Request $request,$id)
    {
        $subcategory = SubCategory::find($id);
        $categories = Category::all();
        return view('admin.edit_subcategory')
            ->with('categories',$categories)
            ->with('subcategory',$subcategory);
    }

    public function editSubCategorySubmit(Request $request)
    {
        if(Input::has('id')) $id = Input::get('id');
        $subcategory = SubCategory::find($id);
        if(Input::has('name')) $subcategory->name = Input::get('name');
        if(Input::has('category_id')) $subcategory->category_id = Input::get('category_id');
        if($subcategory->save())
        {
            flash('Sub-Category has successfully been Edited.')->success();
            return redirect(route('admin.sub-categories'));
        }else{
            flash('Failed to edit Sub-Category')->error();
            return redirect(route('admin.sub-categories'));
        }
    }

    function deleteSubCategory(Request $request,$id){
        $subcategory = SubCategory::find($id);
        return view('admin.admin_subcategory_delete')
            ->with('subcategory',$subcategory);
    }

    function destroySubCategory(Request $request){
        $id = $request->input('id');

        if(SubCategory::destroy($id)){
            flash('Sub-Category deleted successfully')->success();
            return redirect()->route('admin.sub-categories');
        }else{
            flash('Failed to delete Sub-Category')->error();
            return redirect()->route('admin.sub-categories');
        }
    }


    public function showAllType()
    {
        # code...
        $types = Type::all();
        return view('admin.all-types')
            ->with('types',$types);
    }

    public function typeForm()
    {
        return view('admin.new-type');
    }

    public function addType(){
        $type = new Type();
        if(Input::has('name')) $type->name = Input::get('name');
        if(Input::has('position')) $type->position = Input::get('position');
        if($type->save())
        {
            flash('Type has successfully been added.')->success();
            return redirect(route('admin.types'));
        }

        //return "submition awaiting";
    }

    public function editType(Request $request,$id)
    {
        $type = Type::find($id);
        return view('admin.edit_type')
            ->with('type',$type);
    }

    public function editSubmitType(Request $request)
    {
        if(Input::has('id')) $id = Input::get('id');
        $type = Type::find($id);
        if(Input::has('name')) $type->name = Input::get('name');
        if(Input::has('position')) $type->position = Input::get('position');
        if($type->save())
        {
            flash('Type has successfully been Edited.')->success();
            return redirect(route('admin.types'));
        }else{
            flash('Failed to edit Type')->error();
            return redirect(route('admin.types'));
        }
    }

    function positionType(Request $request)
    {
        $id = $request->input('id');
        $type = Type::find($id);
        $type->position = $request->input('position');
        $position = Type::where('position',$request->input('position'))->get();
        if (count($position)<=0){
            if($type->save())
            {
                flash('Type position has successfully been Edited.')->success();
                return redirect(route('admin.types'));
            }else{
                flash('Failed to edit Type position')->error();
                return redirect(route('admin.types'));
            }
        }else{
            flash('Failed to edit Type position! Position already taken.')->error();
            return redirect(route('admin.types'));
        }

    }

    function destroyType(Request $request){
        $id = $request->input('id');

        if(Type::destroy($id)){
            flash('Type deleted successfully')->success();
            return redirect()->route('admin.types');
        }else{
            flash('Failed to delete type')->error();
            return redirect()->route('admin.types');
        }
    }
}
