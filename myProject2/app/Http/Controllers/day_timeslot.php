<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\day_time_slots;
class day_timeslot extends Controller
{
    public function get_day_timeslots(){
        $days = DB::table('days')->get();
        $timesltos = DB::table('time_slots')->get();
        return view('admins.day_timeslots',['days'=>$days, 'timeslots'=>$timesltos]);
    }

    public function add(){
        $day = request('day');
        $timeslots = request('timeslots');
        DB::table('day_time_slots')
        ->where('day_id', '=', $day)->delete();
        foreach($timeslots as $timeslot){
            day_time_slots::create([
                'day_id'=>$day,
                'time_slots_id'=>$timeslot
            ]);
        }
        session()->flash('success', 'day timeslot addded successfully');
        return back();
    }
}
