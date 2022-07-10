<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\levels;
use Illuminate\Support\Facades\DB;
class level extends Controller
{
    public function add(){
        $thename = request('name');
        levels::create([
            'name'=>$thename,
        ]);
        session()->flash('success', 'the level add successfuly');
        return back();
    }
    public function get_levels(){
        $levels = DB::table('levels')->get();
        return view('admins.levels', ['levels'=>$levels]);
    }
    public function Delete($id){
        DB::table('levels')->where('id', '=', $id)->delete();
        session()->flash('success',"the level deleted successfully.");
        return back();
    }
}
