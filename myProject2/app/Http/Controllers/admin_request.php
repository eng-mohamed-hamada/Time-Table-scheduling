<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\student_requests;
class admin_request extends Controller
{
    public function get_admin_requests(){
        $term_id = DB::table('terms')
        ->where('status', '=', 'current')
        ->value('id');
        $requests = DB::table('student_requests')
        ->join('students', 'student_requests.student_id', 'students.id')
        ->where('student_requests.term_id', '=', $term_id)
        ->where('student_requests.status', '=', null)
        ->select('students.id as student_id', 'students.name', 'student_requests.id', 'student_requests.required_hours', 'student_requests.resson', 'student_requests.created_at')
        ->get();
        return view('admins.admin_requests', ['requests'=>$requests]);
    }

    public function update_student_requests($id, $status){
        DB::table('student_requests')
        ->where('id', '=', $id)
        ->update(['status'=>$status]);
        session()->flash('success', 'the requests was '.$status);
        return back();
    }
}
