<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\terms;
use Illuminate\Support\Facades\DB;
class term extends Controller
{
    public function add(){
        $thename = request('name');
        DB::table('terms')
        ->update(['status'=> null]);
        terms::create([
            'name'=>$thename,
            'status'=>'current'
        ]);
        session()->flash('success', 'the term add successfuly');
        return back();
    }
    public function get_terms(){
        $terms = DB::table('terms')->get();
        return view('admins.terms', ['terms'=>$terms]);
    }
    public function Delete($id){
        DB::table('terms')->where('id', '=', $id)->delete();
        session()->flash('success',"the term deleted successfully.");
        return back();
    }
}
