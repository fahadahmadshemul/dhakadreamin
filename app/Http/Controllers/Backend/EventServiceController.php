<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Session;

class EventServiceController extends Controller
{
    //index
    public function index()
    {
        return view('backend.event.add_event_service');
    }
    //save
    public function save(Request $request)
    {
        $request->validate([
            'service_name' => 'required'
        ]);
        $save = new Event;
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Add  Event Service Successfully.....!!');
        return back();
    }
    //show
    public function show()
    {
        $collection = Event::all();
        return view('backend.event.event_service_list', compact('collection'));
    }
    //edit
    public function edit($id)
    {
        $edit = Event::find($id);
        return view('backend.event.edit_event_service', compact('edit'));
    }

    //update
    public function update(Request $request,$id)
    {
        $request->validate([
            'service_name' => 'required'
        ]);
        $save = Event::find($id);
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Update  Event Service Successfully.....!!');
        return back();
    }
    //delete
    public function delete($id)
    {
        $delete = Event::find($id);
        $delete->delete();
        Session::put('error', 'Delete  Event Service Successfully.....!!');
        return back();
    }
}
