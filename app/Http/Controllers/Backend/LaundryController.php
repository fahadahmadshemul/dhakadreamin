<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laundry;
use Session;

class LaundryController extends Controller
{
    //index
    public function index()
    {
        return view('backend.laundry.add_laundry');
    }
    //save
    public function save(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'service_name' => 'required'
        ]);
        $save = new Laundry;
        $save->category = $request->category;
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Add Laundry Service Successfully.....!!');
        return back();
    }
    //show
    public function show()
    {
        $collection = Laundry::orderBy('category', 'asc')->get();
        return view('backend.laundry.laundry_service_list', compact('collection'));
    }
    //edit
    public function edit($id)
    {
        $edit = Laundry::find($id);
        return view('backend.laundry.edit_laundry_service', compact('edit'));
    }

    //update
    public function update(Request $request,$id)
    {
        $request->validate([
            'category' => 'required',
            'service_name' => 'required',
        ]);
        $save = Laundry::find($id);
        $save->category = $request->category;
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Update Laundry Service Successfully.....!!');
        return back();
    }
    //delete
    public function delete($id)
    {
        $delete = Laundry::find($id);
        $delete->delete();
        Session::put('error', 'Delete Laundry Service Successfully.....!!');
        return back();
    }
}
