<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\ServiceCenter;
use App\Models\HowWork;

class HomeController extends Controller
{
    //index
    public function index()
    {
        $rooms = Room::where('book_date_from', NULL)
                    ->where('book_date_to', NULL)
                    ->limit(3)
                    ->get();
        $service_center = ServiceCenter::limit(3)->orderBy('id', 'desc')->get();
        $how_work = HowWork::all();
        return view('welcome', compact('rooms', 'service_center', 'how_work'));
    }
}
