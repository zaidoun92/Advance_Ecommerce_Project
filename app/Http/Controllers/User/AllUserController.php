<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class AllUserController extends Controller
{
    //

    public function MyOrders() {

        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_view',compact('orders'));
    }











    public function OrderDetails($order_id) {

        $order = Order::with('user','division','district','state')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product','order')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('frontend.user.order.order_details',compact('order','orderItem'));

    }









    public function InvoiceDownload($order_id) {
        $order = Order::with('user','division','district','state')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = PDF::loadView('frontend.user.order.order_invoice', compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');

        // return view('frontend.user.order.order_invoice',compact('order','orderItem'));
    }










    public function ReturnOrder(Request $request, $order_id) {

        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);

        $notification = array(
            'message' => 'Return Request Send Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('my.orders')->with($notification);

    }










    public function ReturnOrderList() {
        $orders = Order::where('user_id',Auth::id())->where('return_reason','!=', NULL)->orderBy('id','DESC')->get();
        return view('frontend.user.order.return_order_view',compact('orders'));
    }








    public function CancelOrdersList() {
        $orders = Order::where('user_id',Auth::id())->where('status','cancel')->orderBy('id','DESC')->get();
        return view('frontend.user.order.cancel_order_view',compact('orders'));
    }
}
