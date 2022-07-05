<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function RetuenRequest() {
        $orders = Order::where('return_order',1)->orderBy('id','DESC')->get();
        return view('backend.return_order.return_request',compact('orders'));
    }









    public function RetuenRequestApprove($order_id) {

        Order::where('id',$order_id)->update(['return_order' => 2]);

        $notification = array(
            'message' => 'Return Order Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }











    public function RetuenAllRequest() {
        $orders = Order::where('return_order', 2)->orderBy('id','DESC')->get();
        return view('backend.return_order.all_return_request',compact('orders'));
    }
}
