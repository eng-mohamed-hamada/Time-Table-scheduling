<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student_subjects;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\student_terms;
class student_subject extends Controller
{
    public function get_student_subjects(){
        $subjects = DB::table('subjects')
        ->select('code', 'name', 'hours')->get();
        return view('students.student_subjects', ['subjects'=>$subjects]);
    }

    public function get_student_mark_view(){
        $subjects = DB::table('subjects')
        ->select('code', 'name', 'hours')->get();
        return view('doctors.student_marks', ['subjects'=>$subjects]);
    }

    public function check_student_exits(){
        $student_id = request('student_id');
        $db_student_id = DB::table('students')->where('id', '=', $student_id)->value('id');
        if($student_id != $db_student_id){
            return "0";
        }else{
            return "1";
        }
        
    }
    public function get_thestudent_subjects(){
        $student_id = request('student_id');
        $doctor_id = Auth::guard('webDoctor')->user()->doctor_id;
        $student_subjects = DB::table('student_subjects')
        ->join('students','student_subjects.student_id', '=', 'students.id')
        ->join('subjects','student_subjects.subject_code', '=', 'subjects.code')
        ->whereIn('subjects.code', DB::table('doctor_subjects')->where('doctor_id', '=', $doctor_id)->pluck('subject_code'))
        ->where('students.id', '=', $student_id)
        ->select('subjects.code', 'subjects.name', 'subjects.hours')->get();
        foreach($student_subjects as $subject){
            echo '<option value="'.$subject->code.'&'.$subject->hours.'">'.$subject->name.'</option>';
        }
    }
    public function add(){
        $student_id = Auth::user()->student_id;
        $subjects = request('subjects');
        $term_id = DB::table('terms')->where('status', '=', 'current')->value('id');
        $student_term = DB::table('student_terms')
        ->where('term_id', '=', $term_id)
        ->value('term_id');
        if($student_term != $term_id){
            student_terms::create([
                'student_id'=>$student_id,
                'term_id'=>$term_id
            ]);
        }
        $student_term_id = DB::table('student_terms')
        ->where('student_id', '=', $student_id)
        ->where('term_id', '=', $term_id)
        ->value('id');
        DB::table('student_subjects')
        ->where('student_id', '=', $student_id)
        ->where('student_term_id', '=', $student_term_id)
        ->delete();
        $total_gpa = DB::table('students')
        ->where('id', '=', $student_id)
        ->value('total_gpa');
        $subjects_total_hours = DB::table('subjects')
        ->whereIn('code', $subjects)
        ->sum('hours');
        $student_subjects_count = DB::table('student_subjects')
        ->where('student_id', '=', $student_id)
        ->count('id');
        $registeration_hours = 0;
        $sum_of_student_requests_hours = DB::table('student_requests')
        ->where('student_id', '=', $student_id)
        ->where('status','=', 'accepted')
        ->sum('required_hours');
        if(($student_subjects_count == 0 && $total_gpa == 0.0) || $total_gpa >= 2.0){
            $registeration_hours = 18 + (int)$sum_of_student_requests_hours;
        }else if($total_gpa < 2.0 && $student_subjects_count !=0){
            $registeration_hours = 12 + (int)$sum_of_student_requests_hours;
        }
        if($subjects_total_hours > $registeration_hours){
            session()->flash('success', "you can't register more than ".$registeration_hours);
            return back();
        }else{
            $student_subjects_successfull = DB::table('student_subjects')
                ->where('student_id', '=', $student_id)
                ->where('points', '>', 0.0)
                ->pluck('subject_code')->toArray();
            
            foreach($subjects as $subject){
                $pre_requests = DB::table('pre_requests')
                ->where('subject_code', '=', $subject)
                ->pluck('pre_request_code')->toArray();
                $intersection = count(array_intersect($student_subjects_successfull, $pre_requests));
                if( $intersection != count($pre_requests)){
                    $subject_name = DB::table('subjects')
                    ->where('code', '=', $subject)
                    ->value('name');
                    session()->flash('success', "you can't register: ".$subject_name);
                    return back();
                }
            }
            foreach($subjects as $subject){
                student_subjects::create([
                    'student_id'=> $student_id,
                    'subject_code'=> $subject,
                    'student_term_id'=> $student_term_id
                ]);
            }
            session()->flash('success', "you have registered successfully");
            return back();
        }
    }

    public function calc_subject_points($mark){
        //this array has points, gained hours, gpa
        $points = [];
        if($mark <50){
            $points[0] = 0;
            $points[1]="F";
        }else if($mark >= 50 && $mark <55){
            $points[0] = 1.4;
            $points[1]="D-";
        }else if($mark >= 55 && $mark <60){
            $points[0] = 1.7;
            $points[1]="D";
        }else if($mark >= 60 && $mark <65){
            $points[0] = 2;
            $points[1]="D+";
        }else if($mark >= 65 && $mark <70){
            $points[0] = 2.3;
            $points[1]="C";
        }else if($mark >= 70 && $mark <75){
            $points[0] = 2.6;
            $points[1]="C+";
        }else if($mark >= 75 && $mark <80){
            $points[0] = 2.8;
            $points[1]="B";
        }else if($mark >= 80 && $mark <85){
            $points[0] = 3;
            $points[1]="B+";
        }else if($mark >= 85 && $mark <90){
            $points[0] = 3.3;
            $points[1]="A-";
        }else if($mark >= 90 && $mark <95){
            $points[0] = 3.7;
            $points[1]="A";
        }else if($mark >=95){
            $points[0] = 4;
            $points[1]="A+";
        }
        return $points;
    }
    //this function take total gpa and returns evaluation
    public function calc_evaluation($total_gpa){
        $evaluation = "";
        if($total_gpa < 1.4){
            $evaluation="ضعيف";
        }else if(($total_gpa >= 1.4 && $total_gpa <1.8) || ($total_gpa >= 1.8 && $total_gpa <2)){
            $evaluation = "مقبول";
        }else if(($total_gpa >= 2 && $total_gpa <2.4) || ($total_gpa >= 2.4 && $total_gpa <2.8)){
            $evaluation ="جيد";
        }else if(($total_gpa >= 2.8 && $total_gpa <3.2) || ($total_gpa >= 3.2 && $total_gpa <3.5)){
            $evaluation ="جيد جدا";
        }else if(($total_gpa >= 3.5 && $total_gpa <3.8) || ($total_gpa >= 3.8 && $total_gpa <=4)){
            $evaluation ="ممتاز";
        }
        return $evaluation;
    }

    public function calc_total_gpa($student_id){
            $student_subjects = DB::table('student_subjects')
            ->join('students', 'student_subjects.student_id', '=', 'students.id')
            ->join('subjects', 'student_subjects.subject_code', '=', 'subjects.code')
            ->where('student_subjects.student_id', '=', $student_id)
            ->select('subjects.hours','student_subjects.points', 'student_subjects.gained_hours')->get();
            $sum = 0.0;
            $gained_points = 0.0;
            $total_gained_hours = 0;
            foreach($student_subjects as $subject){
                $sum += (float)$subject->points * (float)$subject->hours;
                $gained_points += (float)$subject->points;
                $total_gained_hours += (int)$subject->gained_hours;
            }

            $subjects_hours_sum = DB::table('student_subjects')
            ->join('subjects', 'student_subjects.subject_code', '=', 'subjects.code')
            ->join('students', 'student_subjects.student_id', '=', 'students.id')
            ->where('student_subjects.student_id', '=', $student_id)
            ->sum('subjects.hours');

            $total_gpa = $sum/(float)$subjects_hours_sum;
            $evaluation = $this->calc_evaluation($total_gpa);
            DB::table('students')
            ->where('id', '=', $student_id)
            ->update([
                'total_gpa'=> $total_gpa,
                'total_gained_points'=>$gained_points,
                'total_gained_hours'=>$total_gained_hours,
                'total_evaluation'=> $evaluation
            ]);
    }

    public function set_marks(){
        $student_id = request('student_id');
        $data = explode('&', request('student_subject'));
        $subject_code = $data[0];
        $subject_hours = $data[1];
        $mark = request('mark');
        $result = $this->calc_subject_points($mark);
        $points = $result[0];
        $gpa = $result[1];
        if($mark < 50){
            $gained_hours = 0;
        }else{
            $gained_hours = $subject_hours;
        }
        $current_term_id = DB::table('terms')
            ->where('status', '=', 'current')
            ->value('id');
        $student_term_id = DB::table('student_terms')
            ->where('term_id', '=', $current_term_id)
            ->value('id');
        DB::table('student_subjects')
        ->where('student_id', '=', $student_id)
        ->where('subject_code', '=', $subject_code)
        ->where('student_term_id', '=', $student_term_id)
        ->update([
            'mark'=> $mark,
            'points'=>$points,
            'gained_hours'=>$gained_hours,
            'gpa'=>$gpa
            ]);

        $null_student_subjects = DB::table('student_subjects')
        ->where('student_id', '=', $student_id)
        ->whereNull('mark')
        ->count('id');
        $gpa =0;
        if($null_student_subjects == "0"){
            //calculating the term gpa
            
            $student_subjects = DB::table('student_subjects')
            ->join('students', 'student_subjects.student_id', '=', 'students.id')
            ->join('subjects', 'student_subjects.subject_code', '=', 'subjects.code')
            ->where('student_subjects.student_id', '=', $student_id)
            ->where('student_subjects.student_term_id', '=', $student_term_id)
            ->select('subjects.hours','student_subjects.points', 'student_subjects.gained_hours')->get();
            $sum = 0.0;
            $gained_points = 0.0;
            foreach($student_subjects as $subject){
                $sum += (float)$subject->points * (float)$subject->hours;
                $gained_points += (float)$subject->points;
            }
            
            $subjects_hours_sum = DB::table('student_subjects')
            ->join('subjects', 'student_subjects.subject_code', '=', 'subjects.code')
            ->join('students', 'student_subjects.student_id', '=', 'students.id')
            ->where('student_subjects.student_id', '=', $student_id)
            ->where('student_subjects.student_term_id', '=', $student_term_id)
            ->sum('subjects.hours');

            $term_gpa = $sum/(float)$subjects_hours_sum;
            $evaluation = $this->calc_evaluation($term_gpa);
            DB::table('student_terms')
            ->where('student_id', '=', $student_id)
            ->where('term_id', '=', $current_term_id)
            ->update([
                'term_gpa'=> $term_gpa,
                'term_evaluation'=> $evaluation,
                'term_gainded_points'=>$gained_points,
                'term_gainded_hours'=>$subjects_hours_sum
            ]);

            //Calculating the total gpa
            $this->calc_total_gpa($student_id);

        }
        session()->flash('success', 'Done');
        return back();
    }

    public function get_academic_registry_view(){
        $student_id = Auth::user()->student_id;
        $depart_name = DB::table('departments')
        ->where('id', '=', DB::table('students')->where('id', '=', $student_id)->value('depart_id'))
        ->value('name');
        return view('students.academic_registry',['depart_name'=> $depart_name]);
    }
    public function get_academic_registry(){
        $student_id = Auth::user()->student_id;
        $student_data = DB::table('students')
        ->where('id', '=', $student_id)
        ->select('id', 'name', 'total_gpa', 'total_gained_points', 'total_gained_hours', 'total_evaluation')
        ->get();
        ///////start student data
        echo '<h2 class="text-center">السجل الاكاديمى</h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover text-center text-center">';
                    foreach($student_data as $row){
                        echo '<tr>
                            <td>كود الطالب</td>
                            <td>'.$row->id.'</td>
                            <td>اسم الطالب</td>
                            <td>'.$row->name.'</td>
                        </tr>
                        <tr>
                            <td>المعدل التراكمى النهائى</td>
                            <td>التقدير</td>
                            <td>اجمالى الساعات المكتسبه</td>
                            <td>اجمالى النقاط</td>
                        </tr>
                        <tr>
                            <td>'.$row->total_gpa.'</td>
                            <td>'.$row->total_evaluation.'</td>
                            <td>'.$row->total_gained_hours.'</td>
                            <td>'.$row->total_gained_points.'</td>
                        </tr>';
                    }
               echo '</table>
            </div>';
        ////// end student data
        $terms_name = DB::table('terms')
        ->whereIn('id', DB::table('student_terms')->where('student_id', '=', $student_id)->pluck('term_id'))
        ->get();
        foreach($terms_name as $term){
            echo '<div class="table-responsive">
                <table class="table table-striped table-bordered table-hover text-center text-center">
                    <tr>
                        <td colspan="9">'.$term->name.'</td>
                    </tr>
                    <tr>
                        <td colspan="4">اسم المقرر</td>
                        <td>وحدات المقرر</td>
                        <td>التقدير</td>
                        <td>النقاط</td>
                        <td>الساعات المكتسبه</td>
                    </tr>';
            $term_subjects = DB::table('student_subjects')
            ->join('subjects', 'student_subjects.subject_code', '=', 'subjects.code')
            ->join('students', 'student_subjects.student_id', '=', 'students.id')
            ->where('students.id', '=', $student_id)
            ->where('student_subjects.student_term_id', '=', DB::table('student_terms')->where('term_id','=', $term->id)->value('id'))
            ->select('subjects.name as subject_name',
            'subjects.hours',
            'student_subjects.gpa',
            'student_subjects.points',
            'student_subjects.gained_hours')->get();
            foreach($term_subjects as $subject){
                echo '<tr>
                    <td colspan="4">'.$subject->subject_name.'</td>
                    <td>'.$subject->hours.'</td>
                    <td>'.$subject->gpa.'</td>
                    <td>'.$subject->points.'</td>
                    <td>'.$subject->gained_hours.'</td>
                </tr>';
            }
            $student_term_data = DB::table('student_terms')
            ->join('students','student_terms.student_id', '=', 'students.id')
            ->where('student_terms.term_id', '=', $term->id)
            ->select('student_terms.term_gpa',
            'students.total_gpa',
            'student_terms.term_evaluation',
            'student_terms.term_gainded_points')->get();
            foreach($student_term_data as $term_data){
                    echo '<tr>
                            <td>المعدل الفصلى</td>
                            <td>'.$term_data->term_gpa.'</td>
                            <td>المعدل التراكمى</td>
                            <td>'.$term_data->total_gpa.'</td>
                            <td>التقدير</td>
                            <td>'.$term_data->term_evaluation.'</td>
                            <td>النقاط المكتسبه</td>
                            <td>'.$term_data->term_gainded_points.'</td>
                        </tr>
                    </table>
                </div>';
            }

        }
    }
}
