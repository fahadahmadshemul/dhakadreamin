<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OwnerSpecial;
use Session;

class OwnerSpecialController extends Controller
{
    //index
    public function index()
    {
        return view('backend.owner_special.add_owner_special');
    }
    //save
    public function save(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'service_name' => 'required'
        ]);
        $save = new OwnerSpecial;
        $save->category = $request->category;
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Add Owner Speacial Successfully.....!!');
        return back();
    }
    //show
    public function show()
    {
        $collection = OwnerSpecial::orderBy('category', 'asc')->get();
        return view('backend.owner_special.owner_special_list', compact('collection'));
    }
    //edit
    public function edit($id)
    {
        $edit = OwnerSpecial::find($id);
        return view('backend.owner_special.edit_owner_special', compact('edit'));
    }

    //update
    public function update(Request $request,$id)
    {
        $request->validate([
            'category' => 'required',
            'service_name' => 'required',
        ]);
        $save = OwnerSpecial::find($id);
        $save->category = $request->category;
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Update Owner Speacial  Successfully.....!!');
        return back();
    }
    //delete
    public function delete($id)
    {
        $delete = OwnerSpecial::find($id);
        $delete->delete();
        Session::put('error', 'Delete Owner Speacial  Successfully.....!!');
        return back();
    }
}
