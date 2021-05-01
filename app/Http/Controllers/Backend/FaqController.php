<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AirportFaq;
use Session;

class FaqController extends Controller
{
    //index
    public function index()
    {
        return view('backend.faq.add_airport_faq');
    }
    //save
    public function save(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'question' => 'required',
            'ans' => 'required'
        ]);
        $save  = new AirportFaq;
        $save->category = $request->category;
        $save->question = $request->question;
        $save->ans = $request->ans;
        $save->save();
        Session::put('success', "Save FAQs Successfully...!");
        return back();
    }
    //show
    public function show()
    {
        $collection = AirportFaq::orderBy('category', 'ASC')->get();
        return view('backend.faq.faq_list', compact('collection'));
    }
    //edit 
    public function edit($id)
    {
        $edit = AirportFaq::find($id);
        return view('backend.faq.edit_faq', compact('edit'));
    }

    //update
    public function update(Request $request,$id)
    {
        $request->validate([
            'category' => 'required',
            'question' => 'required',
            'ans' => 'required'
        ]);
        $save  = AirportFaq::find($id);
        $save->category = $request->category;
        $save->question = $request->question;
        $save->ans = $request->ans;
        $save->save();
        Session::put('success', "Update FAQs Successfully...!");
        return back();
    }
}
