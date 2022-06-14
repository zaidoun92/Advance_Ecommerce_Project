<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //
    public function CouponView() {
        $coupon = Coupon::orderBy('id','DESC')->get();
        return view('backend.coupon.view_coupon',compact('coupon'));
    }









    public function CouponStore(Request $request) {

        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ]);

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);


        $notification = array(
            'message' => 'Coupon Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }











    public function CouponEdit($id) {
        $coupons = Coupon::findOrFail($id);
        return view('backend.coupon.coupon_edit',compact('coupons'));
    }
}
