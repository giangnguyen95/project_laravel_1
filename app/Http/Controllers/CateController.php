<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CateRequest;

use App\Cate;
use Illuminate\Foundation\Auth\ThrottlesLogins;
class CateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $cates = Cate::all();
        return view('admin.cate.list', compact('cates'));
    }

    public function create(){
        $parent = Cate::select('id', 'name', 'parent_id')->get()->toArray();
    	return view('admin.cate.add', compact('parent'));
    }

    public function store(Request $request){
        $this->validate($request, 
            ["txtCateName"=>"required"],
            ["txtCateName"=>"Please enter name category 1"]);
    	$cate              = new Cate;
    	$cate->name        = $request->txtCateName;
    	$cate->alias       = changeTitle($request->txtCateName);
    	$cate->order       = $request->txtOrder;
    	$cate->parent_id   = $request->parent;
    	$cate->keywords    = $request->txtKeywords;
    	$cate->description = $request->txtDescription;
    	$cate->save();
        return redirect('/cates')->with(['flash_level'=>'success','flash_message'=> 'Add Success']);
    }

    public function edit($id){
        $parent = Cate::select('id', 'name', 'parent_id')->get()->toArray();
        $data = Cate::find($id);
        //print_r($parent);
        return view('admin.cate.edit', compact('data','parent'));
    }

    public function update(Request $request, $id){
        $this->validate($request, 
            ["txtCateName"=>"required"],
            ["txtCateName"=>"Please enter name category 1"]);
        $cate = Cate::find($id);
        $cate->name        = $request->txtCateName;
        $cate->alias       = changeTitle($request->txtCateName);
        $cate->order       = $request->txtOrder;
        $cate->parent_id   = $request->parent;
        $cate->keywords    = $request->txtKeywords;
        $cate->description = $request->txtDescription;
        $cate->save();
        return redirect('/cates')->with(['flash_level'=>'success', 'flash_message'=>'Update Success']);
    }

    public function destroy($id){
        $data = Cate::find($id);
        $data ->delete($id);
        return redirect('/cates')->with(['flash_level'=>'success', 'flash_message'=>'Delete Success']);
    }
}
