<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class OrderController extends Controller
{
    //

    public function PendingOrders() {
        $orders = Order::where('status','Pending')->orderBy('id','DESC')->get();
        return view('backend.orders.pending_orders',compact('orders'));
    }








    public function PendingOrdersDetails($order_id) {
        $order = Order::with('user','division','district','state')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product','order')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('backend.orders.pending_orders_details',compact('order','orderItem'));
    }









    public function ConfirmedOrders() {
        $orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
        return view('backend.orders.confirmed_orders',compact('orders'));
    }









    public function ProcessingOrders() {
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('backend.orders.processing_orders',compact('orders'));
    }










    public function PickedOrders() {
        $orders = Order::where('status','picked')->orderBy('id','DESC')->get();
        return view('backend.orders.picked_orders',compact('orders'));
    }











    public function ShippedOrders() {
        $orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
        return view('backend.orders.shipped_orders',compact('orders'));
    }











    public function DeliveredOrders() {
        $orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
        return view('backend.orders.delivered_orders',compact('orders'));
    }











    public function CancelOrders() {
        $orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
        return view('backend.orders.cancel_orders',compact('orders'));
    }










    public function PendingToConfirm($order_id) {

        Order::findOrFail($order_id)->update(['status' => 'confirm']);

        $notification = array(
            'message' => 'Order Confirmed Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('pending.orders')->with($notification);
    }










    public function ConfirmToProcessing($order_id) {

        Order::findOrFail($order_id)->update(['status' => 'processing']);

        $notification = array(
            'message' => 'Order processing Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('confirmed.orders')->with($notification);
    }










    public function ProcessingToPicked($order_id) {

        Order::findOrFail($order_id)->update(['status' => 'picked']);

        $notification = array(
            'message' => 'Order Picked Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('processing.orders')->with($notification);
    }









    public function pickedToShipped($order_id) {

        Order::findOrFail($order_id)->update(['status' => 'shipped']);

        $notification = array(
            'message' => 'Order Shipped Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('picked.orders')->with($notification);
    }











    public function shippedToDelivered($order_id) {

        Order::findOrFail($order_id)->update(['status' => 'delivered']);

        $notification = array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('shipped.orders')->with($notification);
    }











    public function DeliveredToCancel($order_id) {

        Order::findOrFail($order_id)->update(['status' => 'cancel']);

        $notification = array(
            'message' => 'Order Cancel Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('delivered.orders')->with($notification);
    }










    public function AdminInvoiceDownload($order_id) {
        $order = Order::with('user','division','district','state')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = PDF::loadView('backend.orders.order_invoice', compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }


}
