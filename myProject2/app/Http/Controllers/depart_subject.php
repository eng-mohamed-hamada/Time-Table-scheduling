<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\depart_subjects;
use Illuminate\Support\Facades\DB;
class depart_subject extends Controller
{
    public function get_depart_subjects(){
        $departments = DB::table('departments')->get();
        $subjects = DB::table('subjects')
        ->select('code', 'name', 'hours')->get();
        return view('admins.department_subjects', ['departments'=>$departments, 'subjects'=>$subjects]);
    }

    public function add(){
        $depart_id = request('depart_id');
        $subjects = request('subjects');
        DB::table('depart_subjects')->where('depart_id', '=', $depart_id)->delete();
        foreach($subjects as $subject){
            depart_subjects::create([
                'depart_id'=> $depart_id,
                'subject_code'=> $subject
            ]);
        }
        session()->flash('success', 'the department subjects added successfully');
        return back();
    }
}
