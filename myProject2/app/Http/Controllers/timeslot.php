<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\time_slots;
use Illuminate\Support\Facades\DB;
class timeslot extends Controller
{
    public function get_timeslots(){
        $timeslots = DB::table('time_slots')->get();
        return view('admins.timeslots', ['timeslots'=>$timeslots]);
    }
    public function Delete($id){
        DB::table('time_slots')->where('id', '=', $id)->delete();
        session()->flash('success',"the timeslot deleted successfully.");
        return back();
    }
    public function add(){
        $total_hours = (strtotime(request('time_to'))-strtotime(request('time_from')))/(60*60);
        if($total_hours <= '0'){
            session()->flash('success',"the difference between the times can't be: ".$total_hours);
            return back();
        }else{
            $thedata = DB::table('time_slots')->select('time_from', 'time_to', 'total_hours')
            ->where('time_from', '=', request('time_from'))
            ->where('time_to', '=', request('time_to'))
            ->where('total_hours', '=', $total_hours)->get();
            if($thedata == '[]'){
                time_slots::create([
                    'time_from' => request('time_from'),
                    'time_to' => request('time_to'),
                    'total_hours' => $total_hours
                ]);
                session()->flash('success', 'timeslot added successfuly');
                return back();
            }else{
                session()->flash('success', 'the timeslot aready exit');
                return back();
            }
        }
        
    }
}
