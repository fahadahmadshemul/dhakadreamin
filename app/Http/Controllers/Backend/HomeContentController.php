<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCenter;
use App\Models\Setting;
use App\Models\Admin;
use App\Models\Menu;
use App\Models\ContactUs;
use App\Models\AboutUs;
use Session;

class HomeContentController extends Controller
{
    //index
    public function index()
    {
        return view('backend.home_content.add_service_center');
    }
    //save
    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $save = new ServiceCenter;
        $save->title = $request->title;
        $save->description = $request->description;
        $image= $request->file('image');
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
                Session::put('success', 'Add Service Center Successfully.....!');
                return back();
            }
        }
    }

    //show 
    public function show()
    {
        $collection = ServiceCenter::all();
        return view('backend.home_content.service_center_list', compact('collection'));
    }
    //edit
    public function edit($id)
    {
        $edit = ServiceCenter::find($id);
        return view('backend.home_content.edit_service_center', compact('edit'));
    }
    //update
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $save = ServiceCenter::find($id);
        $save->title = $request->title;
        $save->description = $request->description;
        $image= $request->file('image');
        if($image)
        {
            $unlink = $save->image;
            unlink($unlink);
            $image_name = md5(rand(100,1000));
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if($success){
                $save->image = $image_url;
                $save->save();
                Session::put('success', 'Update Service Center Successfully.....!');
                return back();
            }
        }
        $save->image = $image_url;
        $save->save();
        Session::put('success', 'Update Service Center Successfully.....!');
        return back();
    }

    //delete
    public function delete($id)
    {
        $delete = ServiceCenter::find($id);
        $unlink = $delete->image;
        if($unlink != NULL)
        {
            unlink($unlink);
        }
        $delete->delete();
        Session::put('error', 'Delete Service Center Successfully.....!');
        return back();
    }

    public function setting(){
        $setting = Setting::find(1);
        return view('backend.home_content.setting', compact('setting'));
    }
    //update_setting
    public function update_setting(Request $request)
    {
        //dd($request->all());
        $update = Setting::find(1);
        $update->app_video = $request->app_video;

        $site_logo = $request->file('site_logo');
        $dashboard_logo = $request->file('dashboard_logo');
        $app_photo = $request->file('app_photo');
        $cover_image = $request->file('cover_image');

        if($site_logo && $dashboard_logo && $app_photo && $cover_image){
            $image_name = md5(rand(100,10000));
            $ext = strtolower($site_logo->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/image/';
            $image_url = $upload_path.$image_full_name;
            $success = $site_logo->move($upload_path, $image_full_name);

            $image_name2 = md5(rand(100,10000));
            $ext2 = strtolower($dashboard_logo->getClientOriginalExtension());
            $image_full_name2 = $image_name2.'.'.$ext2;
            $upload_path2 = 'public/image/';
            $image_url2 = $upload_path2.$image_full_name2;
            $success2 = $dashboard_logo->move($upload_path2, $image_full_name2);

            $image_name3 = md5(rand(100,10000));
            $ext3 = strtolower($app_photo->getClientOriginalExtension());
            $image_full_name3 = $image_name3.'.'.$ext3;
            $upload_path3 = 'public/image/';
            $image_url3 = $upload_path3.$image_full_name3;
            $success3 = $app_photo->move($upload_path3, $image_full_name3);
            
            $image_name4 = md5(rand(100,10000));
            $ext4 = strtolower($cover_image->getClientOriginalExtension());
            $image_full_name4 = $image_name4.'.'.$ext4;
            $upload_path4 = 'public/image/';
            $image_url4 = $upload_path4.$image_full_name4;
            $success4 = $cover_image->move($upload_path4, $image_full_name4);
            if($success && $success2 && $success3)
            {
                $update->site_logo=$image_url;
                $update->dashboard_logo=$image_url2;
                $update->app_photo=$image_url3;
                $update->cover_image=$image_url4;
                $update = $update->save();

                Session::put('success', 'Update Setting Successfully..!');
                return back();
            }

        }elseif($dashboard_logo && $app_photo && $cover_image){
            $image_name= md5(rand(100,10000));
            $ext = strtolower($dashboard_logo->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/image/';
            $image_url = $upload_path.$image_full_name;
            $success = $dashboard_logo->move($upload_path, $image_full_name);

            $image_name2 = md5(rand(100,10000));
            $ext2 = strtolower($app_photo->getClientOriginalExtension());
            $image_full_name2 = $image_name2.'.'.$ext2;
            $upload_path2 = 'public/image/';
            $image_url2 = $upload_path2.$image_full_name2;
            $success2 = $app_photo->move($upload_path2, $image_full_name2);
            
            $image_name3 = md5(rand(100,10000));
            $ext3 = strtolower($cover_image->getClientOriginalExtension());
            $image_full_name3 = $image_name3.'.'.$ext3;
            $upload_path3 = 'public/image/';
            $image_url3 = $upload_path3.$image_full_name3;
            $success3 = $cover_image->move($upload_path3, $image_full_name3);

            if($success && $success2)
            {
                $update->dashboard_logo=$image_url;
                $update->app_photo=$image_url2;
                $update->cover_image=$image_url3;
                $update = $update->save();
                Session::put('success', 'Update Setting Successfully..!');
                return back();
            }
        }elseif($site_logo && $app_photo && $cover_image){
            $image_name = md5(rand(100,10000));
            $ext = strtolower($site_logo->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/image/';
            $image_url = $upload_path.$image_full_name;
            $success = $site_logo->move($upload_path, $image_full_name);

            $image_name2 = md5(rand(100,10000));
            $ext2 = strtolower($app_photo->getClientOriginalExtension());
            $image_full_name2 = $image_name2.'.'.$ext2;
            $upload_path2 = 'public/image/';
            $image_url2 = $upload_path2.$image_full_name2;
            $success2 = $app_photo->move($upload_path2, $image_full_name2);
            
            $image_name3 = md5(rand(100,10000));
            $ext3 = strtolower($cover_image->getClientOriginalExtension());
            $image_full_name3 = $image_name3.'.'.$ext3;
            $upload_path3 = 'public/image/';
            $image_url3 = $upload_path3.$image_full_name3;
            $success3 = $cover_image->move($upload_path3, $image_full_name3);

            if($success && $success2)
            {
                $update->site_logo=$image_url;
                $update->app_photo=$image_url2;
                $update->cover_image=$image_url3;
                $update = $update->save();

                Session::put('success', 'Update Setting Successfully..!');
                return back();
            }
        }elseif($site_logo && $dashboard_logo && $cover_image){
            $image_name = md5(rand(100,10000));
            $ext = strtolower($site_logo->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/image/';
            $image_url = $upload_path.$image_full_name;
            $success = $site_logo->move($upload_path, $image_full_name);

            $image_name2 = md5(rand(100,10000));
            $ext2 = strtolower($dashboard_logo->getClientOriginalExtension());
            $image_full_name2 = $image_name2.'.'.$ext2;
            $upload_path2 = 'public/image/';
            $image_url2 = $upload_path2.$image_full_name2;
            $success2 = $dashboard_logo->move($upload_path2, $image_full_name2);
            
            $image_name3 = md5(rand(100,10000));
            $ext3 = strtolower($cover_image->getClientOriginalExtension());
            $image_full_name3 = $image_name3.'.'.$ext3;
            $upload_path3 = 'public/image/';
            $image_url3 = $upload_path3.$image_full_name3;
            $success3 = $cover_image->move($upload_path3, $image_full_name3);

            if($success && $success2)
            {
                $update->site_logo=$image_url;
                $update->dashboard_logo=$image_url2;
                $update->cover_image=$image_url3;
                $update = $update->save();
                Session::put('success', 'Update Setting Successfully..!');
                return back();
            }
        }elseif($site_logo){
            
            $image_name = md5(rand(100,10000));
            $ext = strtolower($site_logo->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/image/';
            $image_url = $upload_path.$image_full_name;
            $success = $site_logo->move($upload_path, $image_full_name);
            if($success)
            {
                $update->profile_image=$image_url;
                $update = $update->save();
                Session::put('success', 'Update Setting Successfully..!');
                return back();
            }
        }elseif($dashboard_logo){
            $image_name = md5(rand(100,10000));
            $ext = strtolower($dashboard_logo->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/image/';
            $image_url = $upload_path.$image_full_name;
            $success = $dashboard_logo->move($upload_path, $image_full_name);
            if($success)
            {
                $update->dashboard_logo=$image_url;
                $update = $update->save();
                Session::put('success', 'Update Setting Successfully..!');
                return back();
            }
        }elseif($app_photo){
            $image_name = md5(rand(100,10000));
            $ext = strtolower($app_photo->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/image/';
            $image_url = $upload_path.$image_full_name;
            $success = $app_photo->move($upload_path, $image_full_name);
            if($success)
            {
                $update->app_photo=$image_url;
                $update = $update->save();
                Session::put('success', 'Update Setting Successfully..!');
                return back();
            }
        }elseif($cover_image)
        {
            $image_name = md5(rand(100,10000));
            $ext = strtolower($cover_image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/image/';
            $image_url = $upload_path.$image_full_name;
            $success = $cover_image->move($upload_path, $image_full_name);
            if($success)
            {
                $update->cover_image=$image_url;
                $update = $update->save();
                Session::put('success', 'Update Setting Successfully..!');
                return back();
            }
        }
        $update = $update->save();
        Session::put('success', 'Update Setting Successfully..!');
        return back();
    }

    //change_password
    public function change_password()
    {
        return view('backend.home_content.change_password');
    }
    
    //update_password
    public function update_password(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $id = Session::get('id');
        $update = Admin::find($id);
        $update->password = md5(sha1($request->password));
        $update->save();
        Session::put('success', 'Update Password Successfully.....!');
        return back();
    }
    
    //menu
    public function menu()
    {
        $menu = Menu::find(1);
        return view('backend.home_content.menus', compact('menu'));
    }
    //update_menu
    public function update_menu(Request $request)
    {
        $request->validate([
            'menu1' => 'required',
            'menu2' => 'required',
            'menu3' => 'required',
            'menu4' => 'required',
            'menu5' => 'required',
            'menu6' => 'required',
        ]);
        $update = Menu::find(1);
        $update->menu1 = $request->menu1;
        $update->menu2 = $request->menu2;
        $update->menu3 = $request->menu3;
        $update->menu4 = $request->menu4;
        $update->menu5 = $request->menu5;
        $update->menu6 = $request->menu6;
        $update->save();
        Session::put('success', 'Update Menus Successfully....!');
        return back();
    }
    //b_contact
    public function b_contact()
    {
        $contact = ContactUs::find(1);
        return view('backend.home_content.contact_us', compact('contact'));
    }
    //update_contact
    public function update_contact(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'phone' => 'required',
            'whatsapp' => 'required',
            'skype' => 'required',
            'email' => 'required',
        ]);

        $update = ContactUs::find(1);
        $update->address = $request->address;
        $update->phone = $request->phone;
        $update->whatsapp = $request->whatsapp;
        $update->skype = $request->skype;
        $update->email = $request->email;
        $update->save();
        Session::put('success', 'Update Contact Info Successfully..!');
        return back();
    }
    
    //aboutabout
    public function about()
    {
        $contact = AboutUs::find(1);
        return view('backend.home_content.about_us', compact('contact'));
    }
    //update_about_us
    public function update_about_us(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ]);
        $update = AboutUs::find(1);
        $update->description = $request->description;
        $update->save();
        Session::put('success', 'Update About Us Successfully....!');
        return back();
    }
}
