<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student_requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class student_request extends Controller
{
    public function get_student_requests(){
        $requests = DB::table('student_requests')->get();
        return view('students.student_requests', ['requests'=>$requests]);
    }

    public function add(){
        $student_id = Auth::user()->user_id;
        $required_hours = request('required_hours');
        $resson = request('resson');
        $term_id = DB::table('terms')->where('status', '=', 'current')->value('id');
        student_requests::create([
            'student_id'=>$student_id,
            'required_hours'=>$required_hours,
            'resson'=>$resson,
            'term_id'=>$term_id
        ]);
        session()->flash('success', 'the request sent successfuly');
        return back();
    }

    public function Delete($id){
        DB::table('student_requests')
        ->where('id', '=', $id)
        ->delete();
        session()->flash('success', 'the request deleted successfuly');
        return back();
    }
}
