<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\doctor_day_time_slots;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class doctor_day_timeslot extends Controller
{
    public function get_doctor_day_timeslots(){
        $doctor_id = Auth::user()->user_id;
        $thedoctor_subjects = DB::table('subjects')
        ->join('doctor_subjects', 'subjects.code', '=', 'doctor_subjects.subject_code')
        ->where('doctor_subjects.doctor_id', '=', $doctor_id)
        ->select('code', 'subjects.name', 'doctor_subjects.id')->get();
        return view('doctors.doctor_day_timeslots', ['thesubjects'=>$thedoctor_subjects]);
    }

    public function select_avalable_doctor_time_slots_specificDays(){
        $doctor_id=Auth::user()->user_id;
        $data = explode('&',request('doctor_subjects'));
        $subject_code=$data[1];
        $time_slots_number=request('time_slots_number');
        $check_type="radio";
        $subject_hours="total_hours";
        if($time_slots_number==="1"){
            $check_type="radio";
            $subject_hours="total_hours";
        }else{
            $check_type="checkbox";
            $subject_hours="groups_hours";
        }
        $users= DB::table('day_time_slots')
        ->join('days', 'days.id', '=', 'day_time_slots.day_id')
        ->join('time_slots', 'time_slots.id', '=','day_time_slots.time_slots_id')
        ->where('time_slots.total_hours', '=', 
            DB::table('subjects')->where('code', '=', $subject_code)->value($subject_hours)
        )
        ->whereNotIn('day_time_slots.id', 
            DB::table('doctor_day_time_slots')->where('doctor_id', '=', $doctor_id)->pluck('day_time_slots_id')
        )
        ->whereIn('day_time_slots.day_id', 
            DB::table('doctor_days')->where('doctor_id', '=', $doctor_id)->pluck('day_id')
        )
        ->orderBy('days.name', 'desc')
        ->select('days.id as day_id', 'days.name', 'day_time_slots.id', 'time_slots.id as time_slots_id', 'time_slots.time_from', 'time_slots.time_to')
        ->get();
        $theoutput = '<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover text-center text-center">
		<tr>
                    <td>الرقم</td>
                    <td>اليوم</td>
                    <td>من</td>
                    <td>الى</td>
                    <td>المكان</td>';
                    if($time_slots_number!=="1"){
                        $theoutput .= '<td>المجموعه</td>';
                    }
                    $theoutput .= '<td>الحاله</td>
		</tr>';
                $numbering=1;
                $Place_notifications=0;
                $groups_notifications=0;
		foreach($users as $user){
                    $theoutput .= '<tr id="'.$numbering.'&'.$user->day_id.'&'.$user->time_slots_id.'">
                    <td>'.$numbering.'</td>
                    <td>'.$user->name.'</td>
                    <td>'.$user->time_from.'</td>
                    <td>'.$user->time_to.'</td>';
                    
                        $subject_student_count="0";
                        $subject_student_count=DB::table('student_subjects')->where('subject_code', '=', $subject_code)->count();
                        if($time_slots_number!=="1"){
                            $subject_students2=DB::table('level_groups')->where('level_id', '=', DB::table('subjects')->where('code', '=', $subject_code)->value('level_id'))->count();
                            $subject_student_count=$subject_student_count/$subject_students2;
                        }
                        $theplaces=DB::table('places')
                        ->where('places.capacity','>=', $subject_student_count)
                        ->whereIn('places.id', DB::table('place_days')->whereIn('day_id', [DB::table('doctor_days')->where('doctor_id', '=', $doctor_id)->pluck('day_id')])->pluck('place_id'))
                        ->whereIn('places.id', DB::table('place_day_time_slots')->where('day_time_slots_id', '=', $user->id)->pluck('place_id'))
                        ->select('places.id', 'places.name')
                        ->get();
                        if($theplaces==[]){
                            $Place_notifications++;
                        }
                        $theoutput .= '<td>
                            <select name="theplaces[]">';
                        foreach($theplaces as $theplace){
                            $theoutput .= '<option value="'.$theplace->id.'">'.$theplace->name.'</option>';
                        }
                        $theoutput .= '</select>
                        </td>';
                    if($time_slots_number!=="1"){
                        $thegroups=DB::table('groups')
                        ->join('level_groups', 'groups.id', '=', 'level_groups.group_id')
                        ->join('levels', 'levels.id', '=', 'level_groups.level_id')
                        ->where('levels.id', '=', DB::table('subjects')->where('code', '=', $subject_code)->value('level_id'))
                        ->select('level_groups.id', 'groups.name')
                        ->get();
                        if($thegroups==[]){
                            $groups_notifications++;
                        }
                        $theoutput .= '<td>';
                        $theoutput .= '<select name="thegroups[]">';
                        foreach($thegroups as $thegroup){
                            $theoutput .= '<option value="'.$thegroup->id.'">'.$thegroup->name.'</option>';
                        }
                        $theoutput .= '</select>
                        </td>';
                    }
                    
                    $theoutput .= '<td>
                            <div class="'.$check_type.' form-check">
                                <label>
                                    <input name="chk" type="'.$check_type.'" value="'.$user->id.'"> <span class="label-text"></span>
                                </label>
                            </div>
                    </td>
                    </tr>';
                    $numbering++;
		}
                
                $theoutput .= '</table>
        </div>';
        return $theoutput;
    
    
    }













    
    ///////////////////////////////
    public function checkTimes($f_from,$f_to,$s_from,$s_to){
        $thestat=0;
        if($f_from==$s_from && $f_to==$s_to){
            $thestat=1;
        }else if($f_from==$s_from){
            $thestat=1;
        }else if($f_to==$s_to){
            $thestat=1;
        }else if($f_from>$s_from && $f_from <$s_to){
            $thestat=1;
        }else if($f_from<$s_from && $f_to >$s_from){
            $thestat=1;
        }
        return $thestat;
    }
    public function algorthm1(){
        $day_time_slots_id=request('day_time_slots_id');
        $doctor_id=Auth::user()->user_id;
        $day_id=request('day_id');
        $time_slot_id=request('time_slot_id');
        $subject_code=request('subject_code');
        $place_id=request('place_id');
        $row_id=request('row_id');
        $level_group_id=request('level_group_id');
        $level_id=DB::table('subjects')->where('code', '=', $subject_code)->value('level_id');
        $stat=0;
        $time_from=[];
        $time_to=[];
        for($k=0;$k<count($day_time_slots_id);$k++){
            $time_from[$k]= strtotime(DB::table('time_slots')->where('id', '=', $time_slot_id[$k])->value('time_from'));
            $time_to[$k]= strtotime(DB::table('time_slots')->where('id', '=', $time_slot_id[$k])->value('time_to'));
        }
        for($i=0;$i<count($day_time_slots_id);$i++){
                
                for($j=0;$j<count($day_time_slots_id);$j++){
                    if($i!=$j){
                        if($day_id[$i]== $day_id[$j]){
                            $mystat=$this->checkTimes($time_from[$i],$time_to[$i],$time_from[$j],$time_to[$j]);
                            if($mystat==1){
                                echo "row $row_id[$i]";
                                $stat=1;
                                break;
                            }
                        }
                    }
                    $j++;
                }
            }
        return $stat;
    }
    
    public function run_algorthm(){
        $day_time_slots_id=request('day_time_slots_id');
            $doctor_id=request('doctor_id');
            $day_id=request('day_id');
            $time_slot_id=request('time_slot_id');
            $subject_code=request('subject_code');
            $place_id=request('place_id');
            $row_id=request('row_id');
            $level_group_id=request('level_group_id');
            $level_id=DB::table('subjects')->where('code', '=', $subject_code)->value('level_id');
            $f_from=[];
            $f_to=[];
            for($k=0;$k<count($day_time_slots_id);$k++){
                $f_from[$k]= strtotime(DB::table('time_slots')->where('id', '=', $time_slot_id[$k])->value('time_from'));
                $f_to[$k]= strtotime(DB::table('time_slots')->where('id', '=', $time_slot_id[$k])->value('time_to'));
            }
            
            $therows=DB::table('doctor_day_time_slots')
            ->join('places', 'places.id', '=', 'doctor_day_time_slots.place_id')
            ->join('doctor_subjects', 'doctor_subjects.id', '=', 'doctor_day_time_slots.doctor_subject_id')
            ->join('subjects', 'subjects.code', '=', 'doctor_subjects.subject_code')
            ->join('doctors', 'doctors.id', '=', 'doctor_subjects.doctor_id')
            ->join('day_time_slots', 'day_time_slots.id', '=', 'doctor_day_time_slots.day_time_slots_id')
            ->join('time_slots', 'time_slots.id', '=', 'day_time_slots.time_slots_id')
            ->join('levels', 'levels.id', '=', 'subjects.level_id')
            ->join('days','days.id', '=', 'day_time_slots.day_id')
            ->select(
                'days.id as day_id',
                'subjects.code as subject_code',
                'time_slots.id as time_slots_id',
                'time_slots.time_from',
                'time_slots.time_to',
                'doctors.id as doctor_id',
                'places.id as place_id', 
                'levels.id as level_id',
                'doctor_day_time_slots.level_group_id as thegroup')->get();;
            $stat=0;
            if($therows != null || $therows != []){
                foreach($therows as $therow){
                    for($i=0;$i<count($day_time_slots_id);$i++){
                        if($day_id[$i]==$therow->day_id &&
                        $level_id==$therow->level_id &&
                        $level_group_id[$i]=="null"){
                            $mystat=$this->checkTimes($f_from[$i], $f_to[$i], strtotime($therow->time_from), strtotime($therow->time_to));
                            if($mystat==1){
                                echo "row:$row_id[$i]";
                                $stat=1;
                                break;
                            }
                        }else if($day_id[$i]==$therow->day_id &&
                        $level_id==$therow->level_id &&
                        $level_group_id[$i]!="null" &&
                         $level_group_id[$i]==$therow->thegroup){
                            $mystat=$this->checkTimes($f_from[$i], $f_to[$i], strtotime($therow->time_from), strtotime($therow->time_to));
                            if($mystat==1){
                                echo "row:$row_id[$i]";
                                $stat=1;
                                break;
                            }
                        }else if($day_id[$i]==$therow->day_id &&
                        $time_slot_id[$i]==$therow->time_slots_id &&
                        $level_id==$therow->level_id ){
                            if($level_group_id[$i]=="null" && $therow->thegroup== "null"){
                                echo "change the day or the time in row $row_id[$i]";
                                $stat=1;
                                break;
                            }else if($level_group_id[$i]!="null" && $therow->thegroup!= "null"){
                                if($level_group_id[$i]==$therow->thegroup){
                                    echo "change the group in row $row_id[$i]";
                                    $stat=1;
                                    break;
                                }
                            }
                            
                        }else if($day_id[$i]==$therow->day_id &&
                        $time_slot_id[$i]==$therow->time_slots_id&&
                        $place_id[$i]==$therow->place_id){
                            echo "change the day or the time or the place in row $row_id[$i]";
                            $stat=1;
                            break;
                        }else if($day_id[$i]==$therow->day_id &&
                        $time_slot_id[$i]==$therow->time_slots_id &&
                        $place_id[$i]==$therow->place_id &&
                        $level_id==$therow->level_id){
                            echo "change the day or the time or the place in row $row_id[$i]";
                            $stat=1;
                            break;
                        }else if($day_id[$i]==$therow->day_id &&
                        $time_slot_id[$i]==$therow->time_slots_id &&
                        $doctor_id==$therow->doctor_id){
                            echo " change the day or the time or the doctor in row $row_id[$i]";
                            $stat=1;
                            break;
                        }else if($day_id[$i]==$therow->day_id &&
                        $time_slot_id[$i]==$therow->time_slots_id &&
                        $doctor_id==$therow->doctor_id &&
                        $level_id==$therow->level_id){
                            echo "change the day or the time or the subject level in row $row_id[$i]";
                            $stat=1;
                            break;
                        }else if($day_id[$i]==$therow->day_id &&
                        $time_slot_id[$i]==$therow->time_slots_id &&
                        $doctor_id==$therow->doctor_id &&
                        $place_id[$i]==$therow->place_id){
                            echo "change the day or the time or doctor or place in row $row_id[$i]";
                            $stat=1;
                            break;
                        }else if($day_id[$i]==$therow->day_id &&
                        $time_slot_id[$i]==$therow->time_slots_id &&
                        $doctor_id==$therow->doctor_id &&
                        $place_id[$i]==$therow->place_id &&
                        $level_id==$therow->level_id){
                            echo "change the day or time in row $row_id[$i]";
                            $stat=1;
                            break;
                        }else if($day_id[$i]==$therow->day_id &&
                        $subject_code==$therow->subject_code &&
                        $time_slot_id[$i]==$therow->time_slots_id &&
                        $level_id==$therow->level_id){
                            echo "change the day or time or subject level in row $row_id[$i]";
                            $stat=1;
                            break;
                        }else if($day_id[$i]==$therow->day_id &&
                        $subject_code==$therow->subject_code &&
                        $time_slot_id[$i]==$therow->time_slots_id &&
                        $place_id[$i]==$therow->place_id){
                            echo "change the day or time or place in row $row_id[$i]";
                            $stat=1;
                            break;
                        }else if($day_id[$i]==$therow->day_id &&
                        $subject_code==$therow->subject_code &&
                        $time_slot_id[$i]==$therow->time_slots_id &&
                        $place_id[$i]==$therow->place_id &&
                        $level_id==$therow->level_id){
                            echo "change the day or time in row $row_id[$i]";
                            $stat=1;
                            break;
                        }else if($day_id[$i]==$therow->day_id &&
                        $subject_code==$therow->subject_code &&
                        $time_slot_id[$i]==$therow->time_slots_id &&
                        $doctor_id==$therow->doctor_id){
                            echo "change the day or time doctor in row $row_id[$i]";
                            $stat=1;
                            break;
                        }else if($day_id[$i]==$therow->day_id &&
                        $subject_code==$therow->subject_code &&
                        $time_slot_id[$i]==$therow->time_slots_id &&
                        $doctor_id==$therow->doctor_id &&
                        $level_id==$therow->level_id){
                            echo "change the day or time in row $row_id[$i]";
                            $stat=1;
                            break;
                        }else if($day_id[$i]==$therow->day_id &&
                        $subject_code==$therow->subject_code &&
                        $time_slot_id[$i]==$therow->time_slots_id &&
                        $doctor_id==$therow->doctor_id &&
                        $place_id[$i]==$therow->place_id){
                            echo "change the day or time in row $row_id[$i]";
                            $stat=1;
                            break;
                        }else if($day_id[$i]==$therow->day_id &&
                        $subject_code==$therow->subject_code &&
                        $time_slot_id[$i]==$therow->time_slots_id &&
                        $doctor_id==$therow->doctor_id &&
                        $place_id[$i]==$therow->place_id &&
                        $level_id==$therow->level_id){
                            echo "change the day or time in row $row_id[$i]";
                            $stat=1;
                            break;
                        }else if($day_id[$i]==$therow->day_id &&
                        $place_id[$i]==$therow->place_id){
                            $mystat=$this->checkTimes($f_from[$i], $f_to[$i], strtotime($therow->time_from), strtotime($therow->time_to));
                            if($mystat==1){
                                echo "row:$row_id[$i]";
                                $stat=1;
                                break;
                            }
                        }
                    }
                }
            }
            $mygroups=[];
            for($i=0;$i<count($level_group_id);$i++){
                if(in_array($level_group_id[$i], $mygroups)){
                    $stat=1;
                    echo "change the group in row ".$row_id[$i];
                    break;
                }else{
                    $mygroups[$i]=$level_group_id[$i];
                }
            }
            return $stat;   
    }
    public function add(){
        $day_time_slots_id=request('day_time_slots_id');
            $doctor_id=Auth::user()->user_id;
            $doctor_subject_id=request('doctor_subject_id');
            $place_id=request('place_id');
            $level_group_id=request('level_group_id');
            DB::table('doctor_day_time_slots')->where([
                ['doctor_id', '=', $doctor_id],
                ['doctor_subject_id', '=', $doctor_subject_id]
            ])->delete();
            $result1= $this->algorthm1();
            if($result1==0){
                $result2=$this->run_algorthm();
                if($result2==0){
                    for($i=0;$i<count($day_time_slots_id);$i++){
                        doctor_day_time_slots::create([
                            'doctor_id'=>$doctor_id,
                            'day_time_slots_id'=>$day_time_slots_id[$i],
                            'doctor_subject_id'=>$doctor_subject_id,
                            'place_id'=>$place_id[$i],
                            'level_group_id'=>$level_group_id[$i]
                        ]);
                    }
                    echo "doctor time slot added successfully.";
                   
                }
            }
    }

    public function get_timeslots_count(){
        $data = explode('&',request('doctor_subjects'));
        $doctor_subject_id=$data[0];
        $subject_code = $data[1];
        $devision_type = DB::table('doctor_subjects')->where('id', '=', $doctor_subject_id)->value('devision_type_id');
        $thecount = 1;
        if($devision_type != 1){
            $thecount = DB::table('level_groups')->where('level_id', '=', 
            DB::table('subjects')->where('code', '=', 
                DB::table('doctor_subjects')->where('id', '=', $doctor_subject_id)->value('subject_code')
            )->value('level_id')
        )->count();
        }
        

        return $thecount;
    }
    public function Delete(){
        
    }
    public function doctor_subjects_count(){
        $doctor_id = Auth::user()->user_id;
        $thecount = DB::table('doctor_subjects')->where('doctor_id', '=', $doctor_id)->count();
        return $thecount;
    }
}
