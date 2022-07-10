<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\doctor_subjects;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class doctor_subject extends Controller
{
    public function get_doctor_subjects(){
        $subjects = DB::table('subjects')->select('code', 'name', 'hours')->get();
        return view('doctors.doctor_subjects', ['subjects'=> $subjects]);
    }
    public function add(){

        $doctor_id= Auth::user()->user_id;
        $thesubjects=$_REQUEST['subjects'];
        DB::table('doctor_subjects')->where('doctor_id', '=', $doctor_id)->delete();
        foreach($thesubjects as $subject){
            doctor_subjects::create([
                'doctor_id'=> $doctor_id,
                'subject_code'=>$subject
            ]);
        }
        return 'the doctor subjects add successfully';
    }

    public function get_doctor_subjects_teach_methods(){
        $doctor_id = Auth::user()->user_id;
        $doctor_subjects = DB::table('subjects')
        ->select('code', 'name', 'hours', 'doctor_subjects.id')
        ->join('doctor_subjects', 'subjects.code', '=', 'doctor_subjects.subject_code')
        ->where('doctor_subjects.doctor_id', '=', $doctor_id)
        ->get();
        $theOutput = '<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover text-center text-center">
		<tr>
                    <td>code</td>
                    <td>name</td>
                    <td>hours</td>
                    <td>teach method</td>
		</tr>';
		foreach($doctor_subjects as $subject){
                    $theOutput .= '<tr>
                    <td>'.$subject->code.'</td>
                    <td>'.$subject->name.'</td>
                    <td>'.$subject->hours.'</td>
                    <td>';
                    
                        $teach_methods=DB::table('teach_methods')->get();
                        $theOutput .= '<select name="teach_methods[]">';
                        foreach($teach_methods as $teach_method){
                            $theOutput .= '<option value="'.$subject->id.'&'.$teach_method->id.'">'.$teach_method->name.'</option>';
                        }
                       $theOutput .= '</select>
                        </td>
                    </tr>';
		}
		$theOutput .='</table>
        </div>';
        return $theOutput;
    }

    public function get_doctor_subjects_devision_types(){
        $doctor_id = Auth::user()->user_id;
        $doctor_subjects = DB::table('subjects')
        ->select('code', 'name', 'hours', 'doctor_subjects.id')
        ->join('doctor_subjects', 'subjects.code', '=', 'doctor_subjects.subject_code')
        ->where('doctor_subjects.doctor_id', '=', $doctor_id)
        ->get();
        $theOutput = '<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover text-center text-center">
		<tr>
                    <td>code</td>
                    <td>name</td>
                    <td>hours</td>
                    <td>teach method</td>
		</tr>';
		foreach($doctor_subjects as $subject){
                    $theOutput .= '<tr>
                    <td>'.$subject->code.'</td>
                    <td>'.$subject->name.'</td>
                    <td>'.$subject->hours.'</td>
                    <td>';
                    
                        $devision_types=DB::table('devision_types')->get();
                        $theOutput .= '<select name="devision_types[]">';
                        foreach($devision_types as $devision_type){
                            $theOutput .= '<option value="'.$subject->id.'&'.$devision_type->id.'">'.$devision_type->name.'</option>';
                        }
                       $theOutput .= '</select>
                        </td>
                    </tr>';
		}
		$theOutput .='</table>
        </div>';
        return $theOutput;
    }

    public function set_doctor_subjects_teach_methods(){
        $teach_methods = request('teach_methods');
        foreach($teach_methods as $teach_method){
            $data = explode('&', $teach_method);
            $doctor_subject_id = $data[0];
            $teach_method_id = $data[1];
            DB::table('doctor_subjects')
            ->where('id', '=', $doctor_subject_id)
            ->update(['teach_method_id'=> $teach_method_id]);
        }
        
        return 'doctor subjects teach methods add successfully';
    }

    public function set_doctor_subjects_devision_types(){
        $devision_types = request('devision_types');
        foreach($devision_types as $devision_type){
            $data = explode('&', $devision_type);
            $doctor_subject_id = $data[0];
            $devision_type_id = $data[1];
            DB::table('doctor_subjects')
            ->where('id', '=', $doctor_subject_id)
            ->update(['devision_type_id'=> $devision_type_id]);
        }
        return 'doctor subjects devision_type add successfully';
    }
}
