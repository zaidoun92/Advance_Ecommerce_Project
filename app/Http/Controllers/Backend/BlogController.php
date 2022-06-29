<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function BlogCategory() {

        $blogcategory = BlogPostCategory::latest()->get();
        return view('backend.blog.category.category_view',compact('blogcategory'));
    }









    public function BlogCategoryStore(Request $request) {

        $request->validate([
            'blog_category_name_en' => 'required',
            'blog_category_name_ar' => 'required',
        ]);

        BlogPostCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_ar' => $request->blog_category_name_ar,
            'blog_category_slug_en' => strtolower(str_replace(' ', '_',$request->blog_category_name_en)),
            'blog_category_slug_ar' => str_replace(' ', '_',$request->blog_category_name_ar),
            'created_at' => Carbon::now()
        ]);


        $notification = array(
            'message' => 'Blog Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }











    public function BlogCategoryEdit($blog_id) {

        $blogcategory = BlogPostCategory::findOrFail($blog_id);
        return view('backend.blog.category.category_edit',compact('blogcategory'));

    }









    public function BlogCategoryUpdate(Request $request, $blog_id) {

        // $blogcat_id = $request->id;

        BlogPostCategory::findOrFail($blog_id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_ar' => $request->blog_category_name_ar,
            'blog_category_slug_en' => strtolower(str_replace(' ', '_',$request->blog_category_name_en)),
            'blog_category_slug_ar' => str_replace(' ', '_',$request->blog_category_name_ar),
            'created_at' => Carbon::now()
        ]);


        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('blog.category')->with($notification);
    }








    public function BlogCategoryDelete($blog_id) {

        BlogPostCategory::findOrFail($blog_id)->delete();

        $notification = array(
            'message' => 'Blog Deleted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }








    /////////////////////////////////////// Blog Post All Methods /////////////////////////////////////
    public function ListBlogPost(){
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.post_list',compact('blogpost','blogpost'));

    }









    public function AddBlogPost() {
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::with('postcategory')->latest()->get();
        return view('backend.blog.post.post_add',compact('blogpost','blogcategory'));
    }










    public function BlogPostStore(Request $request) {
        $request->validate([
            'post_title_en' => 'required',
            'post_title_ar' => 'required',
            'post_image'   => 'required',
        ]);


        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(780,433)->save('upload/post/'.$name_gen);
        $save_url = 'upload/post/'.$name_gen;


        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_ar' => $request->post_title_ar,
            'post_slug_en' => strtolower(str_replace(' ', '_',$request->post_title_en)),
            'post_slug_ar' => str_replace(' ', '_',$request->post_title_ar),
            'post_image'   => $save_url,
            'post_details_en' => $request->post_details_en,
            'post_details_ar' => $request->post_details_ar,
            'created_at'   => Carbon::now()
        ]);


        $notification = array(
            'message' => 'Post Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('list.post')->with($notification);
    }


}
