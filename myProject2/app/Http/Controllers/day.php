<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\days;
use Illuminate\Support\Facades\DB;
class day extends Controller
{
    public function add(){
        $thedays=request('days');
        DB::table('days')->delete();
        foreach($thedays as $theday){
            days::create([
                'name'=>$theday
            ]);
        }
        session()->flash("success", "days added successfuly");
        return back();
    }
}
