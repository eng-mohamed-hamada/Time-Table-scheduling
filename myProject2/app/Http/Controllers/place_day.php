<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\place_days;
use Illuminate\Support\Facades\DB;
class place_day extends Controller
{
    public function get_place_days(){
        $places = DB::table('places')->select('id', 'name')->get();
        $days = DB::table('days')->get();
        return view('admins.place_days', ['places'=>$places, 'days'=>$days]);
    }

    public function add(){
        $days = request('days');
        $place = request('place');
        DB::table('place_days')
        ->where('place_id', '=', $place)->delete();
        foreach($days as $day){
            place_days::create([
                'place_id'=>$place,
                'day_id'=>$day
            ]);
        }
        session()->flash('success', 'place days addded successfully');
        return back();
    }
}
