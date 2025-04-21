<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=Validator::make($request->all(),[
            "username"=>"bail|required|unique:admins,username",
            "pasword"=>"bail|required|min:6|max:40",
            "email"=>"bail|required|email|unique:admins,email",
        ])->validate();
        
        $admin=new \App\Models\admin();
        $admin->create([
            "username"=>$request->username,
            "password"=>$request->password,
            "email"=>$request->email
        ]);
        return route("admin.admin.show",["admin"=>$admin->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $p=\App\Models\parkingDuration::select(DB::raw('count(parking_durations.id) as nombre_parking'),DB::raw('count(drivers.id) as nombre_client'))->join('drivers','drivers.id','=','parking_durations.driver_id')
        ->join('parkings','parkings.id','=','parking_durations.parking_id')
        ->where('parkings.admin_id',$id)
        ->get();
        
        $p1=\App\Models\parkingDuration::select('payments.price')
        ->join('payments','payments.parking_duration_id','=','parking_durations.id')
        ->join('parkings','parkings.id','=','parking_durations.parking_id')
        ->where('parkings.admin_id',$id)
        ->get();
        
        $nombre_de_revenue=null;
        if($p1!=null){
            foreach($p1 as $o){
                $nombre_de_revenue+=(double)str_replace("$",'',$o->price);
            }
        }
        $a=\App\Models\admin::find($id);
        return view('admin.home',["admin"=>$id,"p"=>$p,"nombre_de_revenue"=>$nombre_de_revenue,"A"=>$a]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.formparking',["admin"=>$id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $username=$request->username;
      $email=$request->email;
      $ad = DB::table('admins')
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
    
        $admin=new \App\Models\admin();
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
        $admin=new \App\Models\admin();
        Auth::guard('admin')->logout();
        $admin->where('id','=',$id)->delete();
        return redirect()->route('admin.login');
    }
}
