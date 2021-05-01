<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConciergeService;
use Session;

class ConciergeServiceController extends Controller
{
    //index
    public function index()
    {
        return view('backend.concierge_service.add_concierge_service');
    }
    //save
    public function save(Request $request)
    {
        $request->validate([
            'service_name' => 'required'
        ]);
        $save = new ConciergeService;
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Add Concierge Service Successfully.....!!');
        return back();
    }
    //show
    public function show()
    {
        $collection = ConciergeService::all();
        return view('backend.concierge_service.concierge_service_list', compact('collection'));
    }
    //edit
    public function edit($id)
    {
        $edit = ConciergeService::find($id);
        return view('backend.concierge_service.edit_concierge_service', compact('edit'));
    }

    //update
    public function update(Request $request,$id)
    {
        $request->validate([
            'service_name' => 'required'
        ]);
        $save = ConciergeService::find($id);
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Update Concierge Service Successfully.....!!');
        return back();
    }
    //delete
    public function delete($id)
    {
        $delete = ConciergeService::find($id);
        $delete->delete();
        Session::put('error', 'Delete Concierge Service Successfully.....!!');
        return back();
    }
}
