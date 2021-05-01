<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodBeverage;
use Session;

class FoodBeverageController extends Controller
{
    //index
    public function index()
    {
        return view('backend.food_beverage.add_food_beverage_service');
    }
    //save
    public function save(Request $request)
    {
        $request->validate([
            'service_name' => 'required'
        ]);
        $save = new FoodBeverage;
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Add  Food & Beverage Service Successfully.....!!');
        return back();
    }
    //show
    public function show()
    {
        $collection = FoodBeverage::all();
        return view('backend.food_beverage.food_food_beverage_service_list', compact('collection'));
    }
    //edit
    public function edit($id)
    {
        $edit = FoodBeverage::find($id);
        return view('backend.food_beverage.edit_food_beverage_service', compact('edit'));
    }

    //update
    public function update(Request $request,$id)
    {
        $request->validate([
            'service_name' => 'required'
        ]);
        $save = FoodBeverage::find($id);
        $save->service_name = $request->service_name;
        $save->save();
        Session::put('success', 'Update  Food & Beverage Service Successfully.....!!');
        return back();
    }
    //delete
    public function delete($id)
    {
        $delete = FoodBeverage::find($id);
        $delete->delete();
        Session::put('error', 'Delete  Food & Beverage Service Successfully.....!!');
        return back();
    }
}
