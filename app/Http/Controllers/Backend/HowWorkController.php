<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HowWork;
use Session;

class HowWorkController extends Controller
{
    //index
    public function index()
    {
        return view('backend.how_work.add_how_work');
    }

    //save
    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'desc' => 'required',
        ]);
        $save = new HowWork;
        $save->title = $request->title;
        $save->desc = $request->desc;
        $image = $request->file('image');
        if($image)
        {
            $image_name = md5(rand(100,10000));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            $save->image = $image_url;
            $save->save();
            Session::put('success', 'Add How Does It Work Successfully....!');
            return back();
        }
    }

    //show
    public function show()
    {
        $collection = HowWork::all();
        return view('backend.how_work.how_work_list', compact('collection'));
    }

    //edit 
    public function edit($id)
    {
        $edit = HowWork::find($id);
        return view('backend.how_work.edit_how_work', compact('edit'));
    }
    //update
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);
        $save = HowWork::find($id);
        $save->title = $request->title;
        $save->desc = $request->desc;
        $image = $request->file('image');
        if($image)
        {
            $unlink = $save->image;
            if($unlink != NULL)
            {
                unlink($unlink);
            }
            $image_name = md5(rand(100,10000));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            $save->image = $image_url;
            $save->save();
            Session::put('success', 'Update How Does It Work Successfully....!');
            return back();
        }
        $save->save();
        Session::put('success', 'Update How Does It Work Successfully....!');
        return back();
    }

    //delete 
    public function delete($id)
    {
        $delete = HowWork::find($id);
        $unlink = $delete->image;

        if($unlink != NULL)
        {
            unlink($unlink);
        }
        $delete->delete();
        Session::put('error', 'Delete Successfully...!');
        return back();
    }
}
