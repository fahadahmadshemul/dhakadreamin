<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessCenter;
use Session;

class BusinessCenterController extends Controller
{
    //index
    public function index()
    {
        return view('backend.business_center.add_business_center_service');
    }
    //save
    public function save(Request $request)
    {
        $request->validate([
            'service_name' => 'required'
        ]);
        $save = new BusinessCenter;
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Add  Business Center Service Successfully.....!!');
        return back();
    }
    //show
    public function show()
    {
        $collection = BusinessCenter::all();
        return view('backend.business_center.business_center_list', compact('collection'));
    }
    //edit
    public function edit($id)
    {
        $edit = BusinessCenter::find($id);
        return view('backend.business_center.edit_business_center_service', compact('edit'));
    }

    //update
    public function update(Request $request,$id)
    {
        $request->validate([
            'service_name' => 'required'
        ]);
        $save = BusinessCenter::find($id);
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Update   Business Center Service Successfully.....!!');
        return back();
    }
    //delete
    public function delete($id)
    {
        $delete = BusinessCenter::find($id);
        $delete->delete();
        Session::put('error', 'Delete  Business Center Service Successfully.....!!');
        return back();
    }
}
