<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\departments;
use Illuminate\Support\Facades\DB;
class department extends Controller
{
    public function add(){
        departments::create([
            'id'=>request('id'),
            'name'=>request('name')
        ]);
        session()->flash('success', 'the department added successfuly');
        return back();
    }
    public function get_departments(){
        $departments = DB::table('departments')->get();
        return view('admins.departments', ['departments'=>$departments]);
    }
    public function Delete($id){
        DB::table('departments')->where('id', '=', $id)->delete();
        session()->flash('success',"the department deleted successfully.");
        return back();
    }
}
