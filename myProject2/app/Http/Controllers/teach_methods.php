<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\teach_method;
class teach_methods extends Controller
{
    public function teach_methods_count(){
        $thecount = DB::table('teach_methods')->count();
        return $thecount;
    }
    public function get_teach_methods(){
        $teach_methods = DB::table('teach_methods')->get();
        return view('admins.teach_methods', ['teach_methods'=>$teach_methods]);
    }
    public function Delete($id){
        DB::table('teach_methods')->where('id', '=', $id)->delete();
        session()->flash('success',"the teach method deleted successfully.");
        return back();
    }
    public function add(){
        $data = $this->validate(request(),[
            'name' => 'required'
        ]);
        teach_method::create($data);
        session()->flash('success', 'teach method added successufly');
        return redirect('teach/methods');
    }
}
