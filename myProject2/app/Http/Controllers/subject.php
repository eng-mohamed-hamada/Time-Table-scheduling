<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subjects;
use Illuminate\Support\Facades\DB;
class subject extends Controller
{
    public function get_subjects(){
        $levels = DB::table('levels')->get();
        $subjects = DB::table('subjects')->get();
        return view('admins.subjects', ['levels'=>$levels, 'subjects'=>$subjects]);
    }

    public function Delete($code){
        DB::table('subjects')->where('code', '=', $code)->delete();
        session()->flash('success', 'the subject deleted successfully');
        return back();
    }
    public function add(){
        subjects::create([
            'code'=>request('code'),
            'name'=>request('name'),
            'level_id'=>request('level_id'),
            'hours'=>request('hours'),
            'total_hours'=>request('lecture_hours'),
            'groups_hours'=>request('section_hours'),
            'full_mark'=>request('full_mark'),
            'success_mark'=>request('success_mark')
        ]);
        session()->flash('success', 'the subject added successfully');
        return back();
    }
}
