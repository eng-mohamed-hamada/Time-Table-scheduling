<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\degrees;
use Illuminate\Support\Facades\DB;
class degree extends Controller
{
    public function add(){
        $thename = request('name');
        $data = $this->validate(request(), [
            'name'=>'required'
        ]);
        degrees::create($data);
        session()->flash('success', 'the degree add successfuly');
        return back();
    }
    public function get_degrees(){
        $degrees = DB::table('degrees')->get();
        return view('admins.degrees', ['degrees'=>$degrees]);
    }
    public function Delete($id){
        DB::table('degrees')->where('id', '=', $id)->delete();
        session()->flash('success',"the degree deleted successfully.");
        return back();
    }
    
}