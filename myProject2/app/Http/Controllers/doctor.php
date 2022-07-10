<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\doctors;
use Illuminate\Support\Facades\DB;
class doctor extends Controller
{
    public function get_doctors(){
        $departments = DB::table('departments')->get();
        $degrees = DB::table('degrees')->get();
        $doctors = DB::table('doctors')->get();
        return view('admins.doctors',['departments'=>$departments, 'degrees'=>$degrees, 'doctors'=>$doctors]);
    }
    public function Delete($id){
        DB::table('doctors')->where('id', '=', $id)->delete();
        session()->flash('success',"the doctors deleted successfully.");
        return back();
    }

    public function add(){
        doctors::create([
            'id'=>request('id'),
            'name'=>request('name'),
            'depart_id'=>request('depart'),
            'degree_id'=>request('degree'),
        ]);
        session()->flash('success', 'doctor added successufly');
        return back();
    }
}
