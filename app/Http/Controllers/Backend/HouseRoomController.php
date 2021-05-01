<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HousekeppingRoom;
use Session;

class HouseRoomController extends Controller
{
    //index
    public function index()
    {
        return view('backend.housekeeping_room.add_housekepping_room');
    }
    //save
    public function save(Request $request)
    {
        $request->validate([
            'service_name' => 'required'
        ]);
        $save = new HousekeppingRoom;
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Add Housekepping & Room Service Successfully.....!!');
        return back();
    }
    //show
    public function show()
    {
        $collection = HousekeppingRoom::all();
        return view('backend.housekeeping_room.housekepping_room_service_list', compact('collection'));
    }
    //edit
    public function edit($id)
    {
        $edit = HousekeppingRoom::find($id);
        return view('backend.housekeeping_room.edit_housekepping_room_service', compact('edit'));
    }

    //update
    public function update(Request $request,$id)
    {
        $request->validate([
            'service_name' => 'required'
        ]);
        $save = HousekeppingRoom::find($id);
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Update Housekepping & Room  Service Successfully.....!!');
        return back();
    }
    //delete
    public function delete($id)
    {
        $delete = HousekeppingRoom::find($id);
        $delete->delete();
        Session::put('error', 'Delete Housekepping & Room  Service Successfully.....!!');
        return back();
    }
}
