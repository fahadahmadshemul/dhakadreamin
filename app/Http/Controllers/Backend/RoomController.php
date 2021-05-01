<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomContent;
use Session;

class RoomController extends Controller
{
    //index
    public function index()
    {
        return view('backend.room.add_room');
    }

    //save
    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);

        $save = new Room;
        $save->title = $request->title;
        $save->sub_title = $request->sub_title;
        $save->description = $request->description;
        $image = $request->file('image');
        if($image)
        {
            $image_name = md5(rand(100,1000));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if($success){
                $save->image = $image_url;
                $save->save();
                Session::put('success', 'Add Room Successfully.....!');
                return back();
            }
        }
        
    }

    //show
    public function show()
    {
        $collection = Room::all();
        return view('backend.room.room_list', compact('collection'));
    }
    //edit
    public function edit($id){
        $edit = Room::find($id);
        return view('backend.room.edit_room', compact('edit'));
    }

    //update
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
        ]);

        $update = Room::find($id);
        $update->title = $request->title;
        $update->sub_title = $request->sub_title;
        $update->description = $request->description;
        $image = $request->file('image');
        if($image)
        {
            $unlink = $update->image;
            if($image != NULL)
            {
                unlink($unlink);
            }
            $image_name = md5(rand(100,1000));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if($success){
                $update->image = $image_url;
                $update->save();
                Session::put('success', 'Update Room Successfully.....!');
                return back();
            }
        }
        $update->save();
        Session::put('success', 'Update Room Successfully.....!');
        return back();
    }

    //delete
    public function delete($id)
    {
        $delete = Room::find($id);
        $images = $delete->images;
        if($images != NULL)
        {
            $unlinks = explode('|', $images);
            foreach ($unlinks as $unlink) {
                unlink($unlink);
            }
        }
        $delete->delete();
        Session::put('error', 'Delete Room Successfully...!');
        return back();
    }
    //inactive
    public function inactive($id)
    {
        $room = Room::find($id);
        $room->book_date_from = 1;
        $room->book_date_to   = 1;
        $room->booked_user_id = 1;
        $room->save();
        return back();
    }
    //active 
    public function active($id)
    {
        $room = Room::find($id);
        $room->book_date_from = NULL;
        $room->book_date_to   = NULL;
        $room->booked_user_id = NULL;
        $room->save();
        return back();
    }
    //room_content
    public function room_content()
    {
        $edit = RoomContent::find(1);
        return view('backend.room.room_content', compact('edit'));
    }

    public function update_room_content(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);
        $update = RoomContent::find(1);
        $update->title = $request->title;
        $update->desc = $request->desc;
        $update->save();
        Session::put('success', 'Update Successfully...!');
        return back();
    }
}


