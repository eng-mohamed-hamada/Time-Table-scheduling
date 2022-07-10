<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\doctor_days;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class doctor_day extends Controller
{
    public function get_doctor_days(){
        $days = DB::table('days')->get();
        return view('doctors.doctor_days', ['days'=>$days]);
    }
    public function add(){
        $doctor_id = Auth::user()->user_id;
        $days = request('days');
        DB::table('doctor_days')->where('doctor_id', '=', $doctor_id)->delete();
        foreach($days as $day){
            doctor_days::create([
                'doctor_id'=>$doctor_id,
                'day_id'=>$day
            ]);
        }
        session()->flash('success', 'the doctor days added successfully.');
        return back();
    }
}
