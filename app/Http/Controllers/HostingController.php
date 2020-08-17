<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Domen;

class HostingController extends Controller
{
    public function index(){
    	$allDomains = Domen::all()->sortBy('hostDate');
    	return view('index', ['Domens' => $allDomains]);
    }

    public function create(Request $request){
    	if($request->isMethod('post')){
            Domen::create($request->all());
            return redirect()->route('index');
    	}
    	return view('create');
    }
    public function delete($id) {
        Domen::find($id)->delete();
        return redirect()->route('index');
    }
    public function edit($id)
    {
        $myDomen = Domen::find($id);

        return view('edit', ['domen' => $myDomen]);
    }
    public function update(Request $request,$id)
    {
        $myDomen = Domen::find($id);
        $myDomen->fill($request->all());
        $myDomen->save();
        return redirect()->route('index');
    }
}
