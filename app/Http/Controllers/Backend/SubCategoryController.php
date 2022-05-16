<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //

    public function SubCategoryView() {

        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategory','categories'));
    }








    public function SubCategoryStore(Request $request) {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_ar' => 'required',
        ],[
            'category_id.required' => 'Please select category name',
            'subcategory_name_en.required' => 'Input SubCategory English Name',
            'subcategory_name_ar.required' => 'Input SubCategory Arabic Name',
        ]);

        SubCategory::insert([
            'category_id'         => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_en'  => str_replace(' ', '_',$request->subcategory_name_en),
            'subcategory_slug_ar'  => str_replace(' ', '_',$request->subcategory_name_ar),
        ]);


        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }








    public function SubCategoryEdit($id) {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit', compact('subcategory', 'categories'));
    }






    public function SubCategoryUpdate(Request $request) {

        $subcategory_id = $request->id;

        SubCategory::findOrFail($subcategory_id)->update([
            'category_id'         => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_en'  => str_replace(' ', '_',$request->subcategory_name_en),
            'subcategory_slug_ar'  => str_replace(' ', '_',$request->subcategory_name_ar),
        ]);


        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('all.subcategory')->with($notification);
    }









    public function SubCategoryDelete($id) {

        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->back()->with($notification);
    }










    //============================================== SUB Sub Category==================================

    public function SubSubCategoryView() {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view', compact('categories','subsubcategory'));
    }









    public function GetSubCategory($category_id) {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }








    public function SubSubCategoryStore(Request $request) {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_ar' => 'required',
        ],[
            'category_id.required' => 'Please select category name',
            'subcategory_id.required' => 'Please select Sub Category name',
        ]);

        SubSubCategory::insert([
            'category_id'         => $request->category_id,
            'subcategory_id'      => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_ar' => $request->subsubcategory_name_ar,
            'subsubcategory_slug_en'  => str_replace(' ', '-',$request->subsubcategory_name_en),
            'subsubcategory_slug_ar'  => str_replace(' ', '-',$request->subsubcategory_name_ar),
        ]);


        $notification = array(
            'message' => 'Sub-SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }









    public function SubSubCategoryEdit($id) {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $subsubcategories = SubSubCategory::findOrFail($id);
        return view('backend.category.sub_subcategory_edit', compact('categories','subcategories','subsubcategories'));
    }









    public function SubSubCategoryUpdate(Request $request) {

        $subsubcat_id = $request->id;

        SubSubCategory::findOrFail($subsubcat_id)->update([
            'category_id'         => $request->category_id,
            'subcategory_id'      => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_ar' => $request->subsubcategory_name_ar,
            'subsubcategory_slug_en'  => str_replace(' ', '-',$request->subsubcategory_name_en),
            'subsubcategory_slug_ar'  => str_replace(' ', '-',$request->subsubcategory_name_ar),
        ]);


        $notification = array(
            'message' => 'Sub-SubCategory Update Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('all.subsubcategory')->with($notification);
    }










    public function SubSubCategoryDelete($id) {

        SubSubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Sub-SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->back()->with($notification);
    }
}
