<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDivision;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{
    //

    public function DivisionView() {
        $divisions = ShipDivision::orderBy('id','DESC')->get();
        return view('backend.ship.division.view_division',compact('divisions'));
    }








    public function DivisionStore(Request $request) {

        $request->validate([
            'division_name' => 'required',
        ]);

        ShipDivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }









    public function DivisionEdit($id) {
        $divisions = ShipDivision::findOrFail($id);
        return view('backend.ship.division.edit_division', compact('divisions'));
    }








    public function DivisionUpdate(Request $request, $id) {

        ShipDivision::findOrFail($id)->update([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Updated Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('manage.division')->with($notification);
    }










    public function DivisionDelete($id) {

        ShipDivision::findOrFail($id) ->delete();

        $notification = array(
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->back()->with($notification);
    }
}
