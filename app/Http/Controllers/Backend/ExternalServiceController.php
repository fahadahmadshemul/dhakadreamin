<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\External;
use Session;

class ExternalServiceController extends Controller
{
    //index
    public function index()
    {
        return view('backend.external.add_external_service');
    }
    //save
    public function save(Request $request)
    {
        $request->validate([
            'service_name' => 'required'
        ]);
        $save = new External;
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Add External Service Successfully.....!!');
        return back();
    }
    //show
    public function show()
    {
        $collection = External::all();
        return view('backend.external.external_service_list', compact('collection'));
    }
    //edit
    public function edit($id)
    {
        $edit = External::find($id);
        return view('backend.external.edit_external_service', compact('edit'));
    }

    //update
    public function update(Request $request,$id)
    {
        $request->validate([
            'service_name' => 'required'
        ]);
        $save = External::find($id);
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Update External Service Successfully.....!!');
        return back();
    }
    //delete
    public function delete($id)
    {
        $delete = External::find($id);
        $delete->delete();
        Session::put('error', 'Delete External Service Successfully.....!!');
        return back();
    }
}
