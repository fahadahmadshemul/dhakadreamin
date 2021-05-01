<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterSupport;
use Session;

class FooterSupportController extends Controller
{
    //about_footer_content
    public function index()
    {
        return view('backend.footer_content.footer_support');
    }
    //save_about_footer_content
    public function save(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'image' => 'required',
        ]);
        $check = FooterSupport::where('category', $request->category)->first();
        if($check)
        {
            Session::put('error', 'You Already Created This Page Content...!');
            return back();
        }
        $save = new FooterSupport;
        $save->category = $request->category;
        $save->title = $request->title;
        $save->desc = $request->desc;
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
                Session::put('success', 'Add  Successfully.....!');
                return back();
            }
        }
    }

    //about_footer_content_list
    public function show()
    {
        $collection = FooterSupport::all();
        return view('backend.footer_content.footer_support_list', compact('collection'));
    }
    //edit_about_footer_content
    public function edit($id)
    {
        $edit = FooterSupport::find($id);
        return view('backend.footer_content.edit_footer_support', compact('edit'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'desc' => 'required',
        ]);
        $save = FooterSupport::find($id);
        $save->category = $request->category;
        $save->title = $request->title;
        $save->desc = $request->desc;
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
                Session::put('success', 'Add  Successfully.....!');
                return back();
            }
            
        }
        $save->save();
        Session::put('success', 'Update  Successfully.....!');
        return back();
    }
    //delete_about_footer_content
    public function delete($id)
    {
        $delete = FooterSupport::find($id);
        $delete->delete();
        Session::put('success', 'Deleted Successfully...!');
        return back();
    }
}
