<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\place_day_time_slots;
class place_day_timeslot extends Controller
{
    public function get_place_day_timeslots(){
        $places = DB::table('places')->get();
        return view('admins.place_day_timeslots',['places'=>$places]);
    }
    // you should use ajax to call this function stoped here
    public function get_place_time_slots(){
        $timeslots = DB::table('time_slots')
        ->join('day_time_slots','time_slots.id', '=','day_time_slots.time_slots_id')
        ->join('days', 'days.id','=','day_time_slots.day_id')
        ->whereIn('day_time_slots.day_id', DB::table('place_days')->where('place_id', '=', request('place'))
        ->select('day_id'))
        ->select('day_time_slots.id as id','days.name','time_slots.id as timeslot_id','time_from', 'time_to', 'total_hours')->get();
        $outPuts = '<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover text-center text-center">
		<tr>
                    <td>id</td>
                    <td>Day</td>
                    <td>Time From</td>
                    <td>Time To</td>
                    <td>Total Hours</td>
                    <td>Select</td>
        </tr>';
		foreach($timeslots as $timeslot){
                    $outPuts .= '<tr>
                    <td>'.$timeslot->timeslot_id.'</td>
                    <td>'.$timeslot->name.'</td>
                    <td>'.$timeslot->time_from.'</td>
                    <td>'.$timeslot->time_to.'</td>
                    <td>'.$timeslot->total_hours.'</td>
                    <td>
                            <div class="checkbox form-check">
                                <label>
                                    <input name="timeslots[]" type="checkbox" value="'.$timeslot->id.'"> <span class="label-text"></span>
                                </label>
                            </div>
                    </td>
                    </tr>';
		}
		$outPuts .= '</table>
		</div>';
        return $outPuts;
    }
    public function add(){
        $place = request('place');
        $timeslots = request('timeslots');
        DB::table('place_day_time_slots')
        ->where('place_id', '=', $place)->delete();
        foreach($timeslots as $timeslot){
            place_day_time_slots::create([
                'place_id'=>$place,
                'day_time_slots_id'=>$timeslot
            ]);
        }
        session()->flash('success', 'day timeslot addded successfully');
        return back();
    }
}
