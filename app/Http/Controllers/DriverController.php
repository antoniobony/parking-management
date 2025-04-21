<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=Validator::make($request->all(),[
            "username"=>"bail|required|unique:drivers,username",
            "pasword"=>"bail|required|min:6|max:40",
            "email"=>"bail|required|email|:unique:drivers,email",
        ])->validate();
        
        $driver=new \App\Models\driver();
        $driver->create([
            "username"=>$request->username,
            "password"=>$request->password,
            "email"=>$request->email
        ]);
        return route("driver.driver.show",["driver"=>$driver->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('driver.showparking',["driver"=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $username=$request->username;
      $email=$request->email;
      $ad = DB::table('drivers')
           ->whereNot('id',$id )
           ->where(function (Builder $query) use ($username,$email) {
               $query->where('username',$username)
                     ->orWhere('email',$email);
           })
           ->get();
           $value=null;
           foreach($ad as $da){
                $value=$da->id;
           }
        if($value!=null){
            session()->flash('fails',"L'email ou nom d'utilisateur que vous avez modifié appartient déjà à un autre utilisateur");
            return redirect()->back();
        }
        
        $validate=Validator::make($request->all(),[
            "username"=>"bail|required",
            "email"=>"bail|required|email",
        ])->validate();
    
        $admin=new \App\Models\driver();
        $admin->where('id','=',$id)->update([
            "username"=>$username,
            "email"=>$email,    
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $driver=new \App\Models\driver();
        Auth::guard('driver')->logout();
        $admin->where('id','=',$id)->delete();
        return redirect()->route('driver.login');
    }
}
