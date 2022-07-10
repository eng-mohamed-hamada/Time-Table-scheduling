<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\students;
use Illuminate\Support\Facades\DB;
class student extends Controller
{
    public function get_students(){
        $levels = DB::table('levels')->select('id', 'name')->get();
        $departments = DB::table('departments')->select('id', 'name')->get();
        $students  = DB::table('students')->get();
        return view('admins.students', ['levels'=>$levels, 'departments'=>$departments, 'students'=>$students]);
    }
    public function get_groups(){
        $level_groups = DB::table('levels')
        ->join('level_groups', 'levels.id', '=', 'level_groups.level_id')
        ->join('groups', 'groups.id', '=', 'level_groups.group_id')
        ->select('level_groups.id', 'groups.name')
        ->where('levels.id','=', request('level'))
        ->get();
        $theOutput = '<option selected disabled>Choose The Group</option>';
        foreach($level_groups as $level_group){
            $theOutput .= '<option value="'.$level_group->id.'">'.$level_group->name.'</option>';
        }
        return $theOutput;
    }
    public function Delete($id){
        DB::table('students')->where('id', '=', $id)->delete();
        session()->flash('success',"the student deleted successfully.");
        return back();
    }
    public function add(){
        students::create([
            'id' => request('id'),
            'name' => request('name'),
            'level_id' => request('level_id'),
            'depart_id' => request('depart_id'),
            'level_group_id' => request('level_group_id'),
            'total_gpa'=>'0',
            'gained_hours'=>'0'
        ]);
        session()->flash('success','the student added successfuly');
        return back();
    }
}
