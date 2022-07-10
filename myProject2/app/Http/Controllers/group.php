<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\groups;
use Illuminate\Support\Facades\DB;
class group extends Controller
{
    public function add(){
        $thename = request('name');
        groups::create([
            'name'=>$thename
        ]);
        session()->flash('success', 'the group add successfuly');
        return back();
    }
    public function get_groups(){
        $groups = DB::table('groups')->get();
        return view('admins.groups', ['groups'=>$groups]);
    }
    public function Delete($id){
        DB::table('groups')->where('id', '=', $id)->delete();
        session()->flash('success',"the group deleted successfully.");
        return back();
    }
}
