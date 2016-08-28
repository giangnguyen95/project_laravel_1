<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use App\Product;
use Hash;
use Illuminate\Foundation\Auth\ThrottlesLogins;

use Auth;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$users = User::select('id', 'username', 'level')->orderBy('id', 'DESC')->get();
    	return view('admin.user.list', compact('users'));
    }

    public function create(){
    	return view('admin.user.add');
    }

    public function store(UserRequest $request){
    	$user = new User();
    	$user->username = $request->txtUser;
    	$user->email = $request->txtEmail;
    	$user->password =  Hash::make($request->txtPass);
    	$user->level = $request->rdoLevel;
    	$user->remember_token = $request->_token;
    	$user->save();

    	return redirect('/users')->with(['flash_level'=>'success', 'flash_message'=>'Add User Success']);
    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){
        $user_current = Auth::user()->id;
        $user = User::find($id);
        if($id == 2 || ($user_current !=2 && $user["level"] == 1)){
            return redirect('/users')->with(['flash_level'=>'danger', 'flash_message'=>'You can\'t access to delete ']);
        }else{
            $user->delete($id);
            return redirect('/users')->with(['flash_level'=>'success', 'flash_message'=>'Success! Delete user success']);
        }
    }
}
