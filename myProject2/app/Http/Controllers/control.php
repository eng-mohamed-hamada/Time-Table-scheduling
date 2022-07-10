<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\controlls;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class control extends Controller
{
    public static function doctor_table(){
        
        $doctor_id=request('doctor_id');
        $therows=DB::table('the_lectures')->where('doctor_id', '=', $doctor_id)
        ->select('day_name','subject_name','time_from','time_to','doctor_name','place_name','teach_method_name','level_name')
        ->get();
        echo '<div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center text-center">
        <tr>
            <td>Day</td>
            <td>Subject</td>
            <td>From</td>
            <td>To</td>
            <td>Doctor</td>
            <td>Place</td>
            <td>Teach Method</td>
            <td>Level</td>
            <td>Group</td>
        </tr>';
        foreach($therows as $row){
            echo '<tr>
            <td>'.$row->day_name.'</td>
            <td>'.$row->subject_name.'</td>
            <td>'.$row->time_from.'</td>
            <td>'.$row->time_to.'</td>
            <td>'.$row->doctor_name.'</td>
            <td>'.$row->place_name.'</td>
            <td>'.$row->teach_method_name.'</td>
            <td>'.$row->level_name.'</td>
            <td>الكل</td>
            </tr>';
        }
                $thesections=DB::table('the_sections')
                ->where('doctor_id', '=', $doctor_id)
                ->select('day_name','subject_name','time_from','time_to','doctor_name','place_name','teach_method_name','level_name','name')
                ->get();
                foreach($thesections as $thesection){
                    echo '<tr>
                    <td>'.$thesection->day_name.'</td>
                    <td>'.$thesection->subject_name.'</td>
                    <td>'.$thesection->time_from.'</td>
                    <td>'.$thesection->time_to.'</td>
                    <td>'.$thesection->doctor_name.'</td>
                    <td>'.$thesection->place_name.'</td>
                    <td>'.$thesection->teach_method_name.'</td>
                    <td>'.$thesection->level_name.'</td>
                    <td>'.$thesection->name.'</td>
                    </tr>';
                }
        echo '</table>
        </div>';
    }
    public static function depart_table(){
		
        $depart_id=request('depart_id');
        $therows=DB::table('the_lectures_with_depart')
        ->where('depart_id', '=', $depart_id)
        ->select('day_name','subject_name','time_from','time_to','doctor_name','place_name','teach_method_name','level_name','depart_id')
        ->get();
                echo '<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover text-center text-center">
		<tr>
                    <td>Day</td>
                    <td>Subject</td>
                    <td>From</td>
                    <td>To</td>
                    <td>Doctor</td>
                    <td>Place</td>
                    <td>Teach Method</td>
                    <td>Level</td>
                    <td>Groups</td>
                    <td>Department</td>
		</tr>';
		foreach($therows as $row){
                    echo '<tr>
                    <td>'.$row->day_name.'</td>
                    <td>'.$row->subject_name.'</td>
                    <td>'.$row->time_from.'</td>
                    <td>'.$row->time_to.'</td>
                    <td>'.$row->doctor_name.'</td>
                    <td>'.$row->place_name.'</td>
                    <td>'.$row->teach_method_name.'</td>
                    <td>'.$row->level_name.'</td>
                    <td>الكل</td>
                    <td>'.$row->depart_id.'</td>
                    </tr>';
		}
                $thesections=DB::table('the_sections_with_depart')
                ->where('depart_id', '=', $depart_id)
                ->select('day_name','subject_name','time_from','time_to','doctor_name','place_name','teach_method_name','level_name','name','depart_id')
                ->get();
                foreach($thesections as $thesection){
                    echo '<tr>
                    <td>'.$thesection->day_name.'</td>
                    <td>'.$thesection->subject_name.'</td>
                    <td>'.$thesection->time_from.'</td>
                    <td>'.$thesection->time_to.'</td>
                    <td>'.$thesection->doctor_name.'</td>
                    <td>'.$thesection->place_name.'</td>
                    <td>'.$thesection->teach_method_name.'</td>
                    <td>'.$thesection->level_name.'</td>
                    <td>'.$thesection->name.'</td>
                    <td>'.$thesection->depart_id.'</td>
                    </tr>';
                }
		echo '</table>
		</div>';
	}
    public static function level_table(){
		
        $level_id=request('level_id');
        $therows=DB::table('the_lectures')
        ->where('level_id', '=', $level_id)
        ->select('day_name','subject_name','time_from','time_to','doctor_name','place_name','teach_method_name','level_name')
        ->get();
                echo '<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover text-center text-center">
		<tr>
                    <td>Day</td>
                    <td>Subject</td>
                    <td>From</td>
                    <td>To</td>
                    <td>Doctor</td>
                    <td>Place</td>
                    <td>Teach Method</td>
                    <td>Level</td>
                    <td>Groups</td>
		</tr>';
		foreach($therows as $row){
                    echo '<tr>
                    <td>'.$row->day_name.'</td>
                    <td>'.$row->subject_name.'</td>
                    <td>'.$row->time_from.'</td>
                    <td>'.$row->time_to.'</td>
                    <td>'.$row->doctor_name.'</td>
                    <td>'.$row->place_name.'</td>
                    <td>'.$row->teach_method_name.'</td>
                    <td>'.$row->level_name.'</td>
                    <td>الكل</td>
                    </tr>';
		}
                $thesections=DB::table('the_sections')
                ->where('level_id', '=', $level_id)
                ->select('day_name','subject_name','time_from','time_to','doctor_name','place_name','teach_method_name','level_name','name')
                ->get();
                foreach($thesections as $thesection){
                    echo '<tr>
                    <td>'.$thesection->day_name.'</td>
                    <td>'.$thesection->subject_name.'</td>
                    <td>'.$thesection->time_from.'</td>
                    <td>'.$thesection->time_to.'</td>
                    <td>'.$thesection->doctor_name.'</td>
                    <td>'.$thesection->place_name.'</td>
                    <td>'.$thesection->teach_method_name.'</td>
                    <td>'.$thesection->level_name.'</td>
                    <td>'.$thesection->name.'</td>
                    </tr>';
                }
		echo '</table>
		</div>';
	}
    public static function place_table(){
		
        $place_id=request('place_id');
        $therows=DB::table('the_lectures')
        ->where('place_id', '=', $place_id)
        ->select('day_name','subject_name','time_from','time_to','doctor_name','place_name','teach_method_name','level_name')
        ->get();
                echo '<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover text-center text-center">
		<tr>
                    <td>Day</td>
                    <td>Subject</td>
                    <td>From</td>
                    <td>To</td>
                    <td>Doctor</td>
                    <td>Place</td>
                    <td>Teach Method</td>
                    <td>Level</td>
                    <td>Group</td>
		</tr>';
		foreach($therows as $row){
                    echo '<tr>
                    <td>'.$row->day_name.'</td>
                    <td>'.$row->subject_name.'</td>
                    <td>'.$row->time_from.'</td>
                    <td>'.$row->time_to.'</td>
                    <td>'.$row->doctor_name.'</td>
                    <td>'.$row->place_name.'</td>
                    <td>'.$row->teach_method_name.'</td>
                    <td>'.$row->level_name.'</td>
                    <td>الكل</td>
                    </tr>';
		}
                $thesections=DB::table('the_sections')
                ->where('place_id', '=', $place_id)
                ->select('day_name','subject_name','time_from','time_to','doctor_name','place_name','teach_method_name','level_name','name')
                ->get();
                foreach($thesections as $thesection){
                    echo '<tr>
                    <td>'.$thesection->day_name.'</td>
                    <td>'.$thesection->subject_name.'</td>
                    <td>'.$thesection->time_from.'</td>
                    <td>'.$thesection->time_to.'</td>
                    <td>'.$thesection->doctor_name.'</td>
                    <td>'.$thesection->place_name.'</td>
                    <td>'.$thesection->teach_method_name.'</td>
                    <td>'.$thesection->level_name.'</td>
                    <td>'.$thesection->name.'</td>
                    </tr>';
                }
		echo '</table>
		</div>';
	}
    public static function all_table(){
		
        $therows=DB::table('the_lectures')
        ->select('day_name','subject_name','time_from','time_to','doctor_name','place_name','teach_method_name','level_name')
        ->get();
                echo '<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover text-center text-center">
		<tr>
                    <td>Day</td>
                    <td>Subject</td>
                    <td>From</td>
                    <td>To</td>
                    <td>Doctor</td>
                    <td>Place</td>
                    <td>Teach Method</td>
                    <td>Level</td>
                    <td>Group</td>
		</tr>';
		foreach($therows as $row){
                    echo '<tr>
                    <td>'.$row->day_name.'</td>
                    <td>'.$row->subject_name.'</td>
                    <td>'.$row->time_from.'</td>
                    <td>'.$row->time_to.'</td>
                    <td>'.$row->doctor_name.'</td>
                    <td>'.$row->place_name.'</td>
                    <td>'.$row->teach_method_name.'</td>
                    <td>'.$row->level_name.'</td>
                    <td>الكل</td>
                    </tr>';
		}
                $thesections=DB::table('the_sections')
                ->select('day_name','subject_name','time_from','time_to','doctor_name','place_name','teach_method_name','level_name','name')
                ->get();
                foreach($thesections as $thesection){
                    echo '<tr>
                    <td>'.$thesection->day_name.'</td>
                    <td>'.$thesection->subject_name.'</td>
                    <td>'.$thesection->time_from.'</td>
                    <td>'.$thesection->time_to.'</td>
                    <td>'.$thesection->doctor_name.'</td>
                    <td>'.$thesection->place_name.'</td>
                    <td>'.$thesection->teach_method_name.'</td>
                    <td>'.$thesection->level_name.'</td>
                    <td>'.$thesection->name.'</td>
                    </tr>';
                }
                echo '</table>
		</div>';
	}
    public static function control_state(){
        
        $thestate=request('thestate');
        DB::table('controlls')->delete();
        controlls::create([
            'thestat'=>$thestate
        ]);
        return 'the status is: '.$thestate;
    }
}
