<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pressing;
use Session;

class PressingController extends Controller
{
    //index
    public function index()
    {
        return view('backend.pressing.add_pressing');
    }
    //save
    public function save(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'service_name' => 'required'
        ]);
        $save = new Pressing;
        $save->category = $request->category;
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Add Pressing Service Successfully.....!!');
        return back();
    }
    //show
    public function show()
    {
        $collection = Pressing::orderBy('category', 'asc')->get();
        return view('backend.pressing.pressing_service_list', compact('collection'));
    }
    //edit
    public function edit($id)
    {
        $edit = Pressing::find($id);
        return view('backend.pressing.edit_pressing_service', compact('edit'));
    }

    //update
    public function update(Request $request,$id)
    {
        $request->validate([
            'category' => 'required',
            'service_name' => 'required',
        ]);
        $save = Pressing::find($id);
        $save->category = $request->category;
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Update Pressing Service Successfully.....!!');
        return back();
    }
    //delete
    public function delete($id)
    {
        $delete = Pressing::find($id);
        $delete->delete();
        Session::put('error', 'Delete Pressing Service Successfully.....!!');
        return back();
    }
}
