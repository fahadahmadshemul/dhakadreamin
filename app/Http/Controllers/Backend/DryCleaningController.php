<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DryCleaning;
use Session;

class DryCleaningController extends Controller
{
    //index
    public function index()
    {
        return view('backend.dry_cleaning.add_dry_cleaning');
    }
    //save
    public function save(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'service_name' => 'required'
        ]);
        $save = new DryCleaning;
        $save->category = $request->category;
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Add Dry Cleaning Service Successfully.....!!');
        return back();
    }
    //show
    public function show()
    {
        $collection = DryCleaning::orderBy('category', 'asc')->get();
        return view('backend.dry_cleaning.dry_cleaning_service_list', compact('collection'));
    }
    //edit
    public function edit($id)
    {
        $edit = DryCleaning::find($id);
        return view('backend.dry_cleaning.edit_dry_cleaning_service', compact('edit'));
    }

    //update
    public function update(Request $request,$id)
    {
        $request->validate([
            'category' => 'required',
            'service_name' => 'required',
        ]);
        $save = DryCleaning::find($id);
        $save->category = $request->category;
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Update Dry Cleaning Service Successfully.....!!');
        return back();
    }
    //delete
    public function delete($id)
    {
        $delete = DryCleaning::find($id);
        $delete->delete();
        Session::put('error', 'Delete Dry Cleaning Service Successfully.....!!');
        return back();
    }
}
