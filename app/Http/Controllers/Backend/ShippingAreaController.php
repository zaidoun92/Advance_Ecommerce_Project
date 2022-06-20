<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShipState;
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











    public function DistrictView() {

        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::with('division')->orderBy('id','DESC')->get();
        return view('backend.ship.district.view_district',compact('divisions','district'));
    }











    public function DistrictStore(Request $request) {

        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ]);

        ShipDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }










    public function DistrictEdit($id) {
        $district = ShipDistrict::findOrFail($id);
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        return view('backend.ship.district.edit_district', compact('district','divisions'));
    }










    public function DistrictUpdate(Request $request, $id) {


        ShipDistrict::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('manage.district')->with($notification);
    }









    public function DistrictDelete($id) {

        ShipDistrict::findOrFail($id) ->delete();

        $notification = array(
            'message' => 'District Deleted Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->back()->with($notification);
    }















    public function StateView() {
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::orderBy('district_name','ASC')->get();
        $state = ShipState::with('division','district')->orderBy('id','DESC')->get();
        return view('backend.ship.state.view_state', compact('divisions','district','state'));
    }











    public function StateStore(Request $request) {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required',
        ]);

        ShipState::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'State Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }













    public function StateEdit($id) {
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::orderBy('district_name','ASC')->get();
        $state = ShipState::findOrFail($id);
        return view('backend.ship.state.edit_state', compact('divisions','district','state'));
    }









    public function StateUpdate(Request $request, $id) {

        ShipState::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'State Updated Successfully',
            'alert-type' => 'info'
        );

        return Redirect()->route('manage.state')->with($notification);
    }












    public function StateDelete($id) {

        ShipState::findOrFail($id) ->delete();

        $notification = array(
            'message' => 'State Deleted Successfully',
            'alert-type' => 'info',
        );

        return Redirect()->back()->with($notification);
    }


    // public function GetSubDistrict($division_id) {
    //     $subDistrict = ShipDistrict::where('division_id', $division_id)->orderBy('district_name','ASC')->get();
    //     return json_encode($subDistrict);
    // }

}
