<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\Products;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    //

    public function index() {
        $catgories = Category::orderBy('category_name_en','ASC')->get();
        $sliders = Slider::where('status', 1)->orderBy('id','DESC')->limit(3)->get();
        $products = Products::where('status', 1)->orderBy('id','DESC')->limit(6)->get();
        $featured = Products::where('featured', 1)->orderBy('id','DESC')->limit(6)->get();
        $hot_deals = Products::where('hot_deals', 1)->orderBy('id','DESC')->limit(3)->get();
        $special_offer = Products::where('special_offer', 1)->orderBy('id','DESC')->limit(6)->get();
        $special_deals = Products::where('special_deals', 1)->orderBy('id','DESC')->limit(6)->get();

        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Products::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id','DESC')->get();
        // return $skip_category->id;
        // die();

        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Products::where('status', 1)->where('category_id', $skip_category_1->id)->orderBy('id','DESC')->get();

        $skip_brand_1 = Brand::skip(1)->first();
        $skip_brand_product_1 = Products::where('status', 1)->where('brand_id', $skip_brand_1->id)->orderBy('id','DESC')->get();



        return view('frontend.index', compact('catgories','sliders','products','featured','hot_deals','special_offer','special_deals','skip_product_0','skip_category_0','skip_product_1','skip_category_1','skip_brand_1','skip_brand_product_1'));
    }






    public function UserLogout() {
        Auth::logout();

        return Redirect()->route('login');
    }






    public function UserProfile() {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }







    public function UserProfileStore(Request $request) {
            $data = User::find(Auth::user()->id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;

            if ($request->file('profile_photo_path')) {
                $file = $request->file('profile_photo_path');
                @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/user_images'), $filename);
                $data['profile_photo_path'] = $filename;
            }
            $data->save();

            $notification = array(
                'message' => 'User Profile Updated Successfully',
                'alert-type' => 'success'
            );

            return Redirect()->route('dashboard')->with($notification);
    }










    public function UserChangePassword() {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }










    public function UserPasswordUpdate(Request $request) {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password'    => 'required|confirmed',
            ]);

            $hashedPassword = Auth::user()->password;
            if (Hash::check($request->oldpassword, $hashedPassword)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->route('user.logout');
            } else {
                return redirect()->back();
            }
    }








    public function ProductDetails($id,$slug) {
        $product = Products::findOrFail($id);
        $multiImag = MultiImage::where('product_id', $id)->get();
        return view('frontend.product.product_details', compact('product','multiImag'));
    }
}
