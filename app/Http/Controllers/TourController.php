<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourController extends Controller
{
    public function create(Request $request) 
    {
        $date = $request->date;
        $location = $request->location;
        DB::table('tours')->insert([
            "date" => $date,
            "location" => $location
        ]);
        return view('admin.add_to_tour');
    }
    public function update(Request $request) 
    {
        $date = $request->date;
        $location = $request->location;
        DB::table('tours')->update([
            "date" => $date,
            "location" => $location
        ]);
        $dates = Tour::all();
        return view('admin.tour_manager', compact('dates'));
    }
    public function delete(Request $request) 
    {
        $id = $request->id;
        DB::table('tours')->where('id', $id)->delete();
        $dates = Tour::all();
        return view('admin.tour_manager', compact('dates'));
    }
}
