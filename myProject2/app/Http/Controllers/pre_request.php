<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pre_requests;
use Illuminate\Support\Facades\DB;
class pre_request extends Controller
{
    public function get_subjects(){
        $subjects = DB::table('subjects')
        ->select('code', 'name', 'hours')->get();
        return view('admins.pre_requests', ['subjects'=>$subjects]);
    }

    public function add(){
        $subject_code = request('subject_code');
        $thepre_requests = request('pre_request_code');
        //check if the subject exit or not
        $thecode = DB::table('subjects')
        ->where('code', '=', $subject_code)
        ->value('code');
        if($thecode == $subject_code){
            if(in_array($subject_code, $thepre_requests)){
                session()->flash('success', "the subject can't be pre request from it self");
            }else{
                DB::table('pre_requests')->where('subject_code', '=', $subject_code)->delete();
                foreach($thepre_requests as $pre_request_code){
                    pre_requests::create([
                        'subject_code'=> $subject_code,
                        'pre_request_code'=> $pre_request_code
                    ]);
                }
                session()->flash('success', 'the pre requests added successfully');
            }
        }else{
            session()->flash('success', 'there are no subject with this code: '.$subject_code);
        }
        return back();
    }
}
