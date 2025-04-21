<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\admin;
use Illuminate\Http\Request;

class Handler extends Controller
{
    public function signinHandler(Request $request){
        $var=$request->role;
        $model=$request->role=="admin" ? new \App\Models\admin():new \App\Models\driver();
        
        $validate=Validator::make($request->all(),[
            "username"=>"bail|required|unique:{$var}s,username",
            "email"=>"bail|required|email|unique:{$var}s,email",
            "password"=>"bail|required|min:6|max:45",
            "confirm_password"=>"bail|required|same:password"
        ])->validate();
        
        $model->create([
            "username"=>$request->username,
            "email"=>$request->email,
            "password"=>$request->confirm_password,
        ]);
        
        $cd=array(
            "email"=>$request->email,
            "password"=>$request->password
        );

        if(Auth::guard("admin")->attempt($cd)){
            return redirect()->route("admin.admin.show",["admin"=>Auth::guard("admin")->id()]);
        }
        if(Auth::guard("driver")->attempt($cd)){
            return redirect()->route("driver.driver.show",["driver"=>Auth::guard("driver")->id()]);
        }
    }

    public function loginHandler(Request $request){
       $validation = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            "password" => ['required','min:6','max:45']
        ])->validate();

        
        $cd=array(
            "email"=>$request->email,
            "password"=>$request->password
        );

        if(Auth::guard("admin")->attempt($cd)){
            return redirect()->route("admin.admin.show",["admin"=>Auth::guard("admin")->id()]);
        }
        if(Auth::guard("driver")->attempt($cd)){
            return redirect()->route("driver.driver.show",["driver"=>Auth::guard("driver")->id()]);
        }
        session()->flash('fails','Mot de passe incorrect ou email incorrect');
        return redirect()->route("Login");
    }
    
    public function logoutHandler(Request $request)
    {
        if(Auth::guard("admin")->check() ){
            Auth::guard("admin")->logout();
        }else{
            Auth::guard("driver")->logout();
        }
        session()->flash('fails','You are logout');
        return redirect()->route("Login");
    }
}
