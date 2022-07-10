<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\level_groups;
use Illuminate\Support\Facades\DB;
class level_group extends Controller
{
    public function get_level_groups(){
        $levels = DB::table('levels')->select('id', 'name')->get();
        $groups = DB::table('groups')->select('id', 'name')->get();
        return view('admins.level_groups', ['levels'=>$levels, 'groups'=> $groups]);
    }
    public function add(){
        $thelevel = request('level_id');
        $thegroups = request('groups');
        DB::table('level_groups')->where('level_id', '=', $thelevel)->delete();
        foreach($thegroups as $thegroup){
            level_groups::create([
                'level_id'=>$thelevel,
                'group_id'=>$thegroup
            ]);
        }
        
        session()->flash('success', 'the data added successfuly');
        return back();
    }
    public function Delete($id){
        DB::table('level_groups')->where('id', '=', $id)->delete();
        session()->flash('success',"the level group deleted successfully.");
        return back();
    }
}
