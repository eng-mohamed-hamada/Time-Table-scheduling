<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\places;
use Illuminate\Support\Facades\DB;
class place extends Controller
{
    public function add(){
        $thename = request('name');
        $thecapacity = request('capacity');
        $data = $this->validate(request(), [
            'name'=>'required',
            'capacity'=>'required'
        ]);
        places::create($data);
        session()->flash('success', 'the place added successfuly');
        return back();
    }
    public function get_places(){
        $places = DB::table('places')->get();
        return view('admins.places', ['places'=>$places]);
    }
    public function Delete($id){
        DB::table('places')->where('id', '=', $id)->delete();
        session()->flash('success',"the place deleted successfully.");
        return back();
    }
}
