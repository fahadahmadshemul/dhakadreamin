<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AirportContent;
use App\Models\CarRentalContent;
use App\Models\BycycleContent;
use Session;

class AirportContentController extends Controller
{
    //index
    public function index()
    {
        $edit = AirportContent::find(1);
        return view('backend.transport.airport_content', compact('edit'));
    }
    //update
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'vehicle_desc' => 'required'
        ]);

        $update = AirportContent::find(1);
        $update->title = $request->title;
        $update->desc = $request->desc;
        $update->vehicle_desc = $request->vehicle_desc;
        $update->save();
        Session::put('success', 'Update Successfully...!');
        return back();
    }

    //car_rental_content
    public function car_rental_content()
    {
        $edit = CarRentalContent::find(1);
        return view('backend.transport.car_rental_content', compact('edit'));
    }
    //update_rental_content
    public function update_rental_content(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'car_desc' => 'required',
        ]);

        $update = CarRentalContent::find(1);
        $update->title = $request->title;
        $update->car_desc = $request->car_desc;
        $update->save();
        Session::put('success', 'Update Successfully...!');
        return back();
    }

    //car_rental_content
    public function bycycle_rental_content()
    {
        $edit = BycycleContent::find(1);
        return view('backend.transport.bycycle_rental_content', compact('edit'));
    }
    //update_rental_content
    public function update_bycycle_rental_content(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);

        $update = BycycleContent::find(1);
        $update->title = $request->title;
        $update->desc = $request->desc;
        $update->save();
        Session::put('success', 'Update Successfully...!');
        return back();
    }
}
